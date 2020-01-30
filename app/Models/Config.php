<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'config';

    protected $primaryKey = 'conf_name';

    protected $fillable = [
        'conf_name',    // The name of the configuration variable.
                        // General configuration options start with the prefix o_
                        // and general permission options start with the prefix p_
        'conf_value',   // The value of the configuration variable
    ];
}
