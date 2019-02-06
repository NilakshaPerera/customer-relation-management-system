<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventlog extends Model
{
    protected $fillable = ['user_id', 'event', 'functionname' ,'content', 'iserror', 'created_at', 'updated_at'];
    
    public function user(){
         return $this->belongsTo('App\User' , 'user_id');
    }
}
