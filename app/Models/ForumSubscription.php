<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ForumSubscription extends Pivot
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'topic_subscriptions';

    protected $primaryKey = ['user_id', 'forum_id']; // natively not supported by Eloquent

    protected $fillable = [
        'user_id',      // The ID of the user which this subscription belongs to
        'forum_id',     // The ID of the forum which this subscription belongs to
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }
}
