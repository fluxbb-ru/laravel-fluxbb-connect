<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchCache extends Model
{
    public $timestamps = false;

    protected $table = 'search_cache';

    protected $fillable = [
        'ident',        // An identifier for the user who initiated the search.
        // For a guest their IP address is used, for a logged in user, their username
        'search_data',  // A serialized array containing search results
    ];
}
