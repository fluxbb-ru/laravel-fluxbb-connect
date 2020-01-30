<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ban extends Model
{
    public $timestamps = false;

    protected $table = 'bans';

    protected $fillable = [
        'username',     // The username this ban applies to, or NULL for none
        'ip',           // The IP address(es) this ban applies to, or NULL for none
        'email',        // The email address this ban applies to, or NULL for none
        'message',      // A message to be displayed to the banned user
        'expire',       // A UNIX timestamp representing the time the ban should expire
        'ban_creator',  // The ID of the user who created the ban
    ];

    protected $dateFormat = 'U';

    protected $casts = [
        'expire' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'ban_creator');
    }
}
