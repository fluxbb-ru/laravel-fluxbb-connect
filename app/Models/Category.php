<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    protected $table = 'categories';
    protected $fillable = [
        'cat_name',         // The name of the category.
        'disp_position',    // The position of this category in relation to the others.
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function forums()
    {
        return $this->hasMany(Forum::class, 'cat_id');
    }
}
