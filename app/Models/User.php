<?php

namespace App\Models;

// use App\Observers\UserObserver;
use Maharlika\Auth\Authentication as Model;
use Maharlika\Auth\Traits\TokenProvider;
use Maharlika\Contracts\Auth\MustVerifyEmail;
// use Maharlika\Database\Attributes\Observer;
use Maharlika\Database\Traits\HasFactory;
use Maharlika\Notifications\Notifiable;

// #[Observer(UserObserver::class)]
class User extends Model implements MustVerifyEmail
{
    use HasFactory, Notifiable, TokenProvider;
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
