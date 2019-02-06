<?php
/**
 * Created by PhpStorm.
 * User: Samith
 * Date: 1/7/2019
 * Time: 9:59 AM
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
protected $table ="complains";
protected $fillable =['lead_id','client_id','created_at','updated_at','complain'];

}