<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password','role_id','active_id','photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\role','role_id');
    }

    public function photo(){
        return $this->belongsTo('App\Photo','photo_id');
    }

    public function isAdmin(){
        if($this->role->name == "Administrator"){
            return true;
        }

        return false;
    }
}
