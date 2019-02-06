<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Generallead extends Model 
{
    protected $fillable = ['user_id', 'agent_id' ,'client_id', 'comment','marketer_id' , 'name', 'phone', 'email', 'conversionstatus_id', 'remarks', 'status_id', 'product_id' ,'branch_id', 'campaign_id'];
    protected $table = 'generalleads';
    
    public function user() {
        return $this->belongsTo('App\User', 'user_id');
    }
    
    public function agent() {
        return $this->belongsTo('App\User', 'agent_id');
    }
    
    public function marketer() {
        return $this->belongsTo('App\User', 'marketer_id');
    }

    public function branch() {
        return $this->belongsTo('App\Branch' , 'branch_id');
    }
    
    public function campaign() {
        return $this->belongsTo('App\Campaign' , 'campaign_id');
    }
    
    public function conversionstatus(){
        return $this->belongsTo('App\Conversionstatus' , 'conversionstatus_id');
    }
    
    public function product(){ 
         return $this->belongsTo('App\Product' , 'product_id');
    }
    
    public function tradein(){
        return $this->hasOne('App\Tradein');
    }
    
    public function followup(){
        return $this->hasMany('App\Followup');
    }
    public function client() {
        return $this->belongsTo('App\Client' , 'client_id');
    }

}
