<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function product(){
        return $this->belongsTo('App\Product');
    }
    public function client(){
        return $this->belongsTo('App\Client');
    }
}
