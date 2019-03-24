<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public $table = 'shippedto_info';//

    public $fillable = ['user_id','name','country','state','city','address','delivered_time','phone1','phone2','notes','payment_method']; //
//
}
