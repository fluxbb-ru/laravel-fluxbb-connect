<?php

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Str;

class FluxbbUserProvider extends UserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $hashedValue = $user->getAuthPassword();
        if (strlen($hashedValue) === 0) {
            return false;
        }
        $value = $credentials['password'];
        $salt = $user->salt ?? null;

        $authorized = false;
        if (!empty($salt)) {
            if (hash_equals(sha1($salt . sha1($value)), $hashedValue)) {
                // Punbb 1.3 used sha1(salt.sha1(pass))
                $authorized = true;
                tap($user->forceFill(['password' => sha1($value)]))->save();
            }
        } elseif (strlen($hashedValue) == 32) {
            // If the length is 32 then it may be md5 from Punbb/Fluxbb 1.2
            if (hash_equals(md5($value), $hashedValue)) {
                $authorized = true;
                tap($user->forceFill(['password' => sha1($value)]))->save();
            }
        } else {
            // Otherwise we should have a normal sha1 password
            $authorized = hash_equals($hashedValue, sha1($value));
        }

        // With fallback to default Laravel hasher check
        return $authorized || $this->hasher->check($value, $hashedValue);
    }
    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials)
    {
        if (empty($credentials) ||
            (count($credentials) === 1 &&
                array_key_exists('password', $credentials))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->newModelQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'password')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }
}