<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TopicSubscription extends Pivot
{
    public $incrementing = false;

    public $timestamps = false;

    protected $table = 'topic_subscriptions';

    protected $primaryKey = ['user_id', 'topic_id']; // natively not supported by Eloquent

    protected $fillable = [
        'user_id',      // The ID of the user which this subscription belongs to
        'topic_id',     // The ID of the topic which this subscription belongs to
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
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }
}
