<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $rememberTokenName = false;
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];
    protected $hidden = [
        'password',
    ];

}
