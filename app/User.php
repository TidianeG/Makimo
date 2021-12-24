<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
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

    public function client(){
        return $this->belongsTo('App\Client');   
    }
    public function product(){
        return $this->hasMany('App\Product');
    }

        public function isAdmin(){
        return strtolower(@$this->roles) === 'admin'? true : false;
        }
     
        /**Cett méthode va determiner si le user connecté a un role moderator*/
        /**Cett méthode va determiner si le user connecté a un role user*/
        public function isUser(){
            return strtolower(@$this->roles) === 'user'? true : false;
        }
}
