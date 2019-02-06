<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tradein extends Model
{
    protected $fillable = ['generallead_Id', 'oldcar', 'oldcarvalue', 'newcar', 'newcarvalue'];
    
    public function generallead() {
        return $this->belongsTo('App\Generallead' , 'generallead_Id');
    }
}
