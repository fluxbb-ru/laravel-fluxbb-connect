<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Censoring extends Model
{
    public $timestamps = false;

    protected $table = 'censoring';

    protected $fillable = [
        'search_for',   // The term to search for
        'replace_with', // The term to replace with
    ];
}
