<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function product(){
    return $this->hasMany("App\Product");
    }
    public function sous_category(){
    return $this->hasMany("App\Sous_Category");
    }
}
