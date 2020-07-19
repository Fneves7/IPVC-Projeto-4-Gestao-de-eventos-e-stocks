<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //Roles
    public function roles(){
        return $this->belongsToMany(Role::class,
            'role_user', 'user_id', 'role_id');
    }

    public function hasAnyRoles($roles){
        if($this->roles()->whereIn("name", $roles)->first()){
            return true;
        }
        return false;
    }

    public function hasRole($role){
        //dd($this->roles()->where("name", $role)->first());
        if($this->roles()->where("name", $role)->first()){
            return true;
        }
        return false;
    }

    //Eventos
    public function events(){
        return $this->belongsToMany(Event::class,
            'event_user', 'user_id', 'event_id');
    }

    public function stocks(){
        return $this->hasMany(Stock::class, 'user_id', 'id');
    }
}
