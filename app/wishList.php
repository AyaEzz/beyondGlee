<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{
    public $table = 'wishList';//

    public $fillable = ['prod_ID','user_ID'];
}
