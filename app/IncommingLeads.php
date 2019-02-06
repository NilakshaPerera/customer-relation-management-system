<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class IncommingLeads extends  Model
{
    protected $table ='incommingleads';
    protected $fillable = ['telnumber','agent_id', 'line_id' ,'created_at','updated_at','active'];

    public function user(){
        return $this->belongsTo('App\User', 'agent_id');
    }
    
    public function line(){
        return $this->belongsTo('App\Line' , 'line_id');
    }

}