<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Online extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'online';

    protected $primaryKey = ['user_id', 'ident']; // natively not supported by Eloquent

    protected $fillable = [
        'user_id',      // The ID of the user (or 1 if the user is a guest)
        'ident',        // Identification string for the user (Username for logged in users, IP address for guests)
        'logged',       // A UNIX timestamp representing the time of the users last activity
        'idle',         // If the user is idle or not (i.e. their last visit was more than o_timeout_online seconds ago,
        // but less than o_timeout_visit seconds ago
        'last_post',    // A UNIX timestamp representing the time the user last made a post
        'last_search',  // A UNIX timestamp representing the time the user last performed a search
    ];

    protected $dateFormat = 'U';

    protected $casts = [
        'last_post' => 'datetime',
        'last_search' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
