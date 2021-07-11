<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function sous_category(){
        return $this->belongsTo('App\Sous_Category');
    }
    public function localite(){
        return $this->belongsTo('App\Localite');
    }

    public function business(){
        return $this->belongsTo('App\Business');
    }
   
    
}
