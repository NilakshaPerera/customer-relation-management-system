<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 1/3/2019
 * Time: 11:45 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected  $table ='clients';
    protected  $fillable =['name','email','phone'];


    public function leads(){
        return $this->hasMany('App\Generallead');
    }


}