<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    const CREATED_AT = 'posted';
    const UPDATED_AT = 'last_post';

    protected $table = 'topics';

    protected $fillable = [
        'poster',       // The username of the user who posted this topic
        'subject',      // The subject of the topic
        'posted',       // A UNIX timestamp representing the time this topic was posted
        'first_post_id',// The ID of the first post in this topic
        'last_post',    // A UNIX timestamp representing the time the last post was made to this topic
        'last_post_id', // The ID of the last post in this topic
        'last_poster',  // The username of the user who posted the last reply to this topic
        'num_views',    // The number of times this topic has been viewed
        'num_replies',  // The number of replies this topic has
        'closed',       // Is this topic closed?
        'sticky',       // Is this topic a sticky?
        'moved_to',     // If the topic has been moved, the ID of the new topic (this one now solely acts as a redirect)
        'forum_id',     // The ID of the forum this topic is within
    ];

    protected $touches = ['forum'];

    protected $dateFormat = 'U';

    protected $casts = [
        'posted' => 'datetime',
        'last_post' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'topic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function firstPost()
    {
        return $this->belongsTo(Post::class, 'first_post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastPost()
    {
        return $this->belongsTo(Post::class, 'last_post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movedTo()
    {
        return $this->belongsTo(Topic::class, 'moved_to');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'topic_subscriptions', 'topic_id', 'user_id')
            ->using(TopicSubscription::class);
    }
}
