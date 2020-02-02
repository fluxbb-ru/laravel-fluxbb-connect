<?php

use App\Models\User;

function avatar(User $user)
{
    return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($user->email))) . '?s=80&d=mp&r=g';
}