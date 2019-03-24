<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $table = 'orders';//

    public $fillable = ['total_cost','paid','status','user_id','shippedTo_id','total_discount','totalcoupon_dis']; //

}
