<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pageController extends Controller
{

    function getDistro()
    {
        $dists = DB::table('distributors')->get();
        return view('/layouts/distributors')->with(['dists'=>$dists]);
    }

    //
}
