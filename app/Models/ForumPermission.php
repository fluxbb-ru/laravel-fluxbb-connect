<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ForumPermission extends Pivot
{
    public $incrementing = false;

    public $timestamps = false; // natively not supported by Eloquent

    protected $table = 'forum_perms';

    protected $primaryKey = ['group_id', 'forum_id'];

    protected $fillable = [
        'group_id',     // The ID of the group this permission set applies to
        'forum_id',     // The ID of the forum this permission set applies to
        'read_forum',   // Allow members of the group to view this forum?
        'post_replies', // Allow members of the group to post replies in this forum?
        'post_topics',  // Allow members of the group to start new topics in this forum?
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }
}
