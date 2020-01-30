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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'username',
        'password',
        'email',
        'title',
        'realname',
        'url',
        'jabber',
        'icq',
        'msn',
        'aim',
        'yahoo',
        'location',
        'signature',
        'disp_topics',
        'disp_posts',
        'email_setting',
        'notify_with_post',
        'auto_notify',
        'show_smilies',
        'show_img',
        'show_img_sig',
        'show_avatars',
        'show_sig',
        'timezone',
        'dst',
        'time_format',
        'date_format',
        'language',
        'style',
        'num_posts',
        'last_post',
        'last_search',
        'last_email_sent',
        'last_report_sent',
        'registered',
        'registration_ip',
        'last_visit',
        'admin_note',
        'activate_string',
        'activate_key',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'activate_string',
        'activate_key',
    ];

    /**
     * The storage format of the model's date columns.
     *
     * @var string
     */
    protected $dateFormat = 'U';

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'last_post' => 'datetime',
        'last_search' => 'datetime',
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
}
