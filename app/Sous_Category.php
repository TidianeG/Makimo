<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sous_Category extends Model
{
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function product(){
        return $this->hasMany('App\Product');
    }
}
