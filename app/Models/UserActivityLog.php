<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model
{
    public $timestamps = false; // since we're using 'accessed_at' manually, or set to true if using created_at

    protected $fillable = [
        'user_id',
        'url',
        'method',
        'ip_address',
        'user_agent',
        'accessed_at',
    ];
}
