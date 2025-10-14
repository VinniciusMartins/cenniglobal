<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model
{
    protected $fillable = [
        'user_id',
        'email',
        'ip',
        'user_agent',
        'logged_in_at'
    ];

    public $timestamps = true;
}
