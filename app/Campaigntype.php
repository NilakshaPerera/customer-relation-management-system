<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaigntype extends Model
{
    protected $fillable = ['id', 'name'];
    
    public function campaign() {
        return $this->hasOne('App\Campaign' , 'id');
    }
    
}
