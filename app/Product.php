<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';//

    public $fillable = ['name','description','image','add_images','supCateg_id','sale','discount','price','featured','add_info']; //
////
}
