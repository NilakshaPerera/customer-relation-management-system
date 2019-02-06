<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model {

    protected $fillable = ['number'];
    protected $table = 'lines';
    
    
    public function incomingLead(){
        return $this->hasMany('App\IncommingLeads');
    }
    
    public function user(){
        return $this->hasOne('App\User');
    }

}
