<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{      
   
    protected $fillable = ['user_id', 'name', 'description' , 'hasinternal' , 'active'];
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function campaign() {
        return $this->hasOne('App\Campaign' , 'id');
    }
    
    public function generallead() {
        return $this->hasMany('App\Generallead');
    }
}
