<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public $table = 'likes';//

    public $fillable = ['prod_id','user_id']; //
//
}
