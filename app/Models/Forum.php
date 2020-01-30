<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Forum extends Model
{
    const CREATED_AT = null;
    const UPDATED_AT = 'last_post';

    protected $table = 'forums';

    protected $fillable = [
        'forum_name',   // The name of the forum
        'forum_desc',   // A description of the forum (may contain HTML)
        'redirect_url', // The URL to redirect users to upon clicking the forum link, or NULL for a normal forum
        'moderators',   // A serialized associative PHP array with moderator names ⇒ user IDs
        'num_topics',   // The number of topics the forum contains
        'num_posts',    // The number of posts the forum contains
        'last_post',    // A UNIX timestamp representing the time the last post was made in the forum
        'last_post_id', // The ID of the last post that was made in the forum
        'last_poster',  // The username (or guest name) of the user that made the last post in the forum
        'sort_by',      // How the posts in the forum should be sorted.
                        // 0 = By last post time,
                        // 1 = By topic start time
        'disp_position',// The position of this forum in relation to the others.
        'cat_id',       // The ID of the category in which this forum resides.
    ];

    protected $dateFormat = 'U';

    protected $casts = [
        'last_post' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function topics()
    {
        return $this->hasMany(Topic::class, 'forum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lastPost()
    {
        return $this->belongsTo(Post::class, 'last_post_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'forum_perms', 'forum_id', 'group_id')
            ->using(ForumPermission::class)
            ->withPivot([
                'read_forum',
                'post_replies',
                'post_topics',
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'forum_subscriptions', 'forum_id', 'user_id')
            ->using(ForumSubscription::class);
    }
}
