<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    const PUN_UNVERIFIED = 0;
    const PUN_ADMIN = 1;
    const PUN_MOD = 2;
    const PUN_GUEST = 3;
    const PUN_MEMBER = 4;

    public $timestamps = false;

    protected $table = 'groups';

    protected $primaryKey = 'g_id';

    protected $fillable = [
        'g_title',              // The name of this group
        'g_user_title',         // The user title to be used for members of this group
        'g_promote_min_posts',  //
        'g_promote_next_group', //
        'g_moderator',          // Does this group have moderator privileges?
        'g_mod_edit_users',     // If g_moderator, can members of this group edit users profiles?
        'g_mod_rename_users',   // If g_moderator, can members of this group rename users?
        'g_mod_change_passwords',// If g_moderator, can members of this group change users passwords?
        'g_mod_ban_users',      // If g_moderator, can members of this group ban users?
        'g_read_board',         // Can members of this group view boards?
                                // If this is 0 the group basically has no access to the forums
        'g_view_users',         // Can members of this group view the user list?
        'g_post_replies',       // Can members of this group post replies?
        'g_post_topics',        // Can members of this group start new topics?
        'g_edit_posts',         // Can members of this group edit their own posts?
        'g_delete_posts',       // Can members of this group delete their own posts?
        'g_delete_topics',      // Can members of this group delete their own topics (including all replies)?
        'g_post_links',         // Can members of this group add links to their posts, signatures or website profile field?
        'g_set_title',          // Can members of this group set their own user title?
        'g_search',             // Can members of this group use the search features?
        'g_search_users',       // Can members of this group search the user list?
        'g_promote_min_posts',  // The number of posts needed to be promoted to a new group (if enabled)
        'g_promote_next_group', // The ID of the group users of this group are promoted to once they reach the number of posts set in g_promote_min_posts.
                                // 0 if disabled
        'g_send_email',         // Can members of this group send emails to users?
        'g_post_flood',         // How many seconds members of this group must wait between making posts
        'g_search_flood',       // How many seconds members of this group must wait between making search requests
        'g_email_flood',        // How many seconds members of this group must wait between sending emails
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function forums()
    {
        return $this->belongsToMany(Forum::class, 'forum_perms', 'group_id', 'forum_id')
            ->using(ForumPermission::class)
            ->withPivot([
                'read_forum',
                'post_replies',
                'post_topics',
            ]);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }
}
