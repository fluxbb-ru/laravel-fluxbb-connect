<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class SearchMatch extends Pivot
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'search_matches';

    protected $primaryKey = ['post_id', 'word_id']; // natively not supported by Eloquent

    protected $fillable = [
        'post_id',          // The ID of the post which this word can be found
        'word_id',          // The ID of the word which can be found there
        'subject_match',    // 0 = The word is in the post body,
                            // 1 = the word is in a topic subject
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function word()
    {
        return $this->belongsTo(SearchWord::class, 'word_id');
    }
}
