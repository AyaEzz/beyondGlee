<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    public $table = 'product_details';//

    public $fillable = ['prod_id','color','size','SizeNu','amount','serial_no']; //
////
}
