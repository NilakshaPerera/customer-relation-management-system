<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model {

    protected  $table = 'branches';
    protected $fillable = ['name', 'city_id', 'covercity_id'];

    public function user() {
        return $this->hasOne('App\User','id');
    }
    
    public function generalInLead(){
        return $this->hasMany('App\Generallead');
    }
    
    public function city(){
        return $this->belongsTo('App\City', 'city_id');
    }
}
