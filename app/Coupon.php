<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public $table = 'sale_coupon';//

    public $fillable = ['code','amount','fisubcategory','fiusers','max_use_times','start_time','end_time']; //

}
