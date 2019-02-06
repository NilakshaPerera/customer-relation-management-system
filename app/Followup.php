<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Followup extends Model
{
    protected $fillable = ['generallead_id', 'comment', 'conversionstatus_id'];
    
    public function generallead() {
        return $this->belongsTo('App\Generallead' , 'generallead_Id');
    }
    
    public function conversionstatus(){
        return $this->belongsTo('App\Conversionstatus' , 'conversionstatus_id');
    }
}
