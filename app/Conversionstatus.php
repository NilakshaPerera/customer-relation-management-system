<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversionstatus extends Model
{
    protected $table = "conversionstatuses";
    protected $fillable = [ 'name', 'detail', 'colorcode'];
    
    public function generalInLead(){
        return $this->hasMany('App\Generallead');
    }
    
}
