<?php

namespace App\Models;

//use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const CREATED_AT = 'registered';
    const UPDATED_AT = null;

    protected $table = 'users';

    protected $fillable = [
        'group_id',         // The ID of the group to which this user belongs.
                            // The default is Group::PUN_MEMBER
        'username',         // The users username
        'password',         // The users password hash
        'email',            // The users email address
        'title',            // The user title. If this field is empty, the title from the user's user group will be used
        'realname',         // The real name of the user
        'url',              // The website of the user
        'jabber',           // The Jabber address of the user
        'icq',              // The Icq address of the user
        'msn',              // The MSN address of the user
        'aim',              // The Aim address of the user.
        'yahoo',            // The Yahoo! address of the user
        'location',         // The location of the user. This can be a country, city or something else
        'signature',        // The contents of the users signature
        'disp_topics',      // The number of topics to display per page, or the forum default 'o_disp_topics_default'
        'disp_posts',       // The number of posts to display per page, or the forum default 'o_disp_posts_default'
        'email_setting',    // The level of privacy for the users email address:
                            // 0 = Show email address to other users,
                            // 1 = Hide email address but allow others users to send emails via the forums,
                            // 2 = Hide email address and don't allow other users to send emails
        'notify_with_post', // Should a plain-text version of the post be included in subscription emails to the user?
        'auto_notify',      // Should the user automatically be subscribed to their own posts?
        'show_smilies',     // Should smilies in posts be shown to the user?
        'show_img',         // Should images in posts be shown to the user?
        'show_img_sig',     // Should images in signatures be shown to the user?
        'show_avatars',     // Should avatars be shown to the user?
        'show_sig',         // Should signatures to shown to the user?
        'timezone',         // The users timezone
        'dst',              // Is the user currently observing daylight saving time?
        'time_format',      // The time format that the user uses
        'date_format',      // The date format that the user uses
        'language',         // The language that should be used for this user
        'style',            // The name of the style that should be used for this user
        'num_posts',        // The number of posts the user has made
        'last_post',        // A UNIX timestamp representing the time the user last made a post
        'last_search',      // A UNIX timestamp representing the time the user last performed a search
        'last_email_sent',  // A UNIX timestamp representing the time the user last sent an email via the forums
        'last_report_sent', // A UNIX timestamp representing the time the user last sent a report
        'registered',       // A UNIX timestamp representing the time the user registered
        'registration_ip',  // The IP address used by the user when registering
        'last_visit',       // A UNIX timestamp representing the time of the users last visit
        'admin_note',       // A note that the administrator has entered
        'activate_string',  // A temporary storage string for new passwords and new e-mail addresses
        'activate_key',     // A temporary storage string for new password and new e-mail address activation keys
    ];

    protected $hidden = [
        'password',
        'activate_string',
        'activate_key',
    ];

    protected $dateFormat = 'U';

    protected $casts = [
        'last_post' => 'datetime',
        'last_search' => 'datetime',
        'last_email_sent' => 'datetime',
        'last_report_sent' => 'datetime',
        'registered' => 'datetime',
        'last_visit' => 'datetime',
    ];

    /**
     * Get the real name if specified, or login name otherwise
     *
     * @return string
     */
    public function getNameAttribute()
    {
        return strlen($this->realname) == 0 ? $this->username : $this->realname;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'activate_string';
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function createdBans()
    {
        return $this->hasMany(Ban::class, 'ban_creator');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
    {
        return $this->hasMany(Post::class, 'poster_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function topicSubscriptions()
    {
        return $this->belongsToMany(Topic::class, 'topic_subscriptions', 'user_id', 'topic_id')
            ->using(TopicSubscription::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forumSubscriptions()
    {
        return $this->belongsToMany(Forum::class, 'forum_subscriptions', 'user_id', 'forum_id')
            ->using(ForumSubscription::class);
    }
}
