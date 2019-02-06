<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{    
    protected  $table = 'cities';
    protected $fillable = ['id', 'datetime', 'name'];
    
    public function branch() {
        return $this->hasOne('App\Branch' , 'id');
    }
}
