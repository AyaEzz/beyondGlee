<?php

namespace App\Http;

use App\Cart;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Session;

class NavBarComposer
{
    public function compose(View $view) {

        $categories = DB::table('categorey')->orderBy('order_num','asc')->get();
        $subcategories = DB::table('supcategorey')->orderBy('order_num','asc')->get();


        $view->with(['categories'=>$categories,'subcategories'=>$subcategories]);
    }
}