<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Project[] $projects
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Team[] $teams
 * @mixin \Eloquent
 */
class User extends Authenticatable
{
    use Notifiable;

    public function projects(){
        return $this->hasMany('App\Project', 'userId');
    }

    public function teams(){
        return $this->belongsToMany('App\Team');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
