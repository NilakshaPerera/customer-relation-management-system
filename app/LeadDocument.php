<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeadDocument extends Model
{
    protected $table = "leaddocuments";
    protected $fillable = ['lead_id', 'nic', 'nic_comment','created_at','updated_at'];
}