<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Role() 
    {
        return $this->belongsTo(Role::class);
    }

    public function Photo() 
    {
        return $this->belongsTo(Photo::class);
    }

    public function Posts() 
    {
        return $this->hasMany(Post::class);
    }

    public function isAdmin()
    {
        if ( $this->role_id == 1 ) {
            return true;
        } else {
            return false;
        }
               
    }

    public function isAuthor()
    {
        if ( $this->role_id == 2 ) {
            return true;
        } else {
            return false;
        }
               
    }


    public function isActive()
    {
        if ( $this->is_active == 1 ) {
            return true;
        } else {
            return false;
        }
               
    }



}
