<?php

namespace App\Models;

use Maharlika\Auth\Authentication;
// use Maharlika\Auth\Traits\HasApiTokens;
use Maharlika\Contracts\Auth\MustVerifyEmail;
use Maharlika\Database\Traits\HasFactory;
use Maharlika\Notifications\Notifiable;

class User extends Authentication implements MustVerifyEmail
{
    use HasFactory, Notifiable;
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable =  [
        'name',
        'email',
        'provider',
        'provider_id',
        'password',
        'status',
        'avatar',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    
}
