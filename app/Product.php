<?php

namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //use HasFactory;
    protected $guarded = [];
    
    protected $fillable = [
        'image_product'
    ];
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
    public function user(){
        return $this->belongsTo('App\User');
    }
    
}
