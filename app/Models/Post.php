<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    const CREATED_AT = 'posted';
    const UPDATED_AT = 'edited';

    protected $table = 'posts';

    protected $fillable = [
        'poster',       // The username of the user who created this post
        'poster_id',    // The ID of the user who created this post
        'poster_ip',    // The IP address of the user who created this post
        'poster_email', // If the post was created by a guest, their email address. If it was created by a logged in user, then NULL
        'message',      // The contents of the post.
        'hide_smilies', // Should smilies be hidden in this post?
        'posted',       // A UNIX timestamp representing the time this post was created
        'edited',       // A UNIX timestamp representing the time this post was last edited, or NULL if it hasn't been edited
        'edited_by',    // The username of the user who last edited this post, or NULL if it hasn't been edited
        'topic_id',     // The ID of the parent topic for this post
    ];

    protected $touches = ['topic'];

    protected $dateFormat = 'U';

    protected $casts = [
        'posted' => 'datetime',
        'edited' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'poster_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function words()
    {
        return $this->belongsToMany(SearchWord::class, 'search_matches', 'post_id', 'word_id')
            ->using(SearchMatch::class)
            ->withPivot([
                'subject_match',
            ]);
    }
}
