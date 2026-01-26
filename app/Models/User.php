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
        'role',
        'status',
        'avatar',
        'cover_photo',
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


    public function post()
    {
        return $this->hasMany(Post::class);
    }


    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }


    public function chatRooms()
    {
        return $this->belongsToMany(ChatRoom::class, 'chat_room_members', 'user_id', 'room_id')
            ->withTimestamps();
    }

    public function messages()
    {
        return $this->hasMany(ChatMessage::class, 'user_id', 'id');
    }
    
}
