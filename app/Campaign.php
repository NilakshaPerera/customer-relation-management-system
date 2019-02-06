<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $fillable = [ 'user_id', 'name', 'started', 'ended', 'campaigntype_id', 'product_id', 'active'];
    
    public function user() {
        return $this->belongsTo('App\User' , 'user_id');
    }
    
    public function generallead(){
        return $this->hasMany('App\Generallead');
    }
    
    public function product(){
        return $this->belongsTo('App\Product', 'product_id');
    }
    
    public function campaign_type(){
        return $this->belongsTo('App\Campaigntype', 'campaigntype_id');
    }
    
}
