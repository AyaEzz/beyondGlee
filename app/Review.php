<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public $table = 'reviews';//

    public $fillable = ['prod_id','user_id','rate_value','comment']; //
//
}
