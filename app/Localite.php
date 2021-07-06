<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localite extends Model
{
    //
    public function product(){
    return $this->hasMany("App\Localite");
    }
}
