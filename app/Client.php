<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function user(){
        return $this->hasMany('App\User');   
    }

    public function credit(){
        return $this->belongsTo('App\Credit');   
    }

    public function payment(){
        return $this->hasMany('App\Payment');
    }
}
