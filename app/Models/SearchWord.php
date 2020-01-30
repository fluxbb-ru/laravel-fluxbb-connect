<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SearchWord extends Model
{
    public $timestamps = false;

    protected $table = 'search_words';

    protected $fillable = [
        'word', // The word to be indexed
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
    {
        return $this->belongsToMany(Post::class, 'search_matches', 'word_id', 'post_id')
            ->using(SearchMatch::class)
            ->withPivot([
                'subject_match',
            ]);
    }
}
