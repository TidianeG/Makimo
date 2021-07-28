<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    public function client(){
        return $this->hasMany('App\Client');
    }
}
