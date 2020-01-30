<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    const CREATED_AT = 'created';
    const UPDATED_AT = null;

    protected $table = 'reports';

    protected $fillable = [
        'post_id',      // The ID of the reported post
        'topic_id',     // The ID of topic in which the reported post is contained
        'forum_id',     // The ID of the forum in which the reported post is contained
        'reported_by',  // The ID of the user who created the report
        'created',      // A UNIX timestamp representing the time this report was created
        'message',      // The report message entered by the user
        'zapped',       // A UNIX timestamp representing the time this report was zapped (marked as read)
        'zapped_by',    // The ID of the user who zapped (marked as read) this report
    ];

    protected $dateFormat = 'U';

    protected $casts = [
        'created' => 'datetime',
        'zapped' => 'datetime',
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
    public function topic()
    {
        return $this->belongsTo(Topic::class, 'topic_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function forum()
    {
        return $this->belongsTo(Forum::class, 'forum_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function author()
    {
        return $this->belongsTo(User::class, 'reported_by');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reviewer()
    {
        return $this->belongsTo(User::class, 'zapped_by');
    }
}
