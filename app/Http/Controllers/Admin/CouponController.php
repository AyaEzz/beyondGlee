<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Coupon;


class CouponController extends Controller
{

    function getAdd(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $categories = DB::table('categorey')->get();
                $subcategories = DB::table('supcategorey')->get();

                $users=DB::table('users')->where('active','=',true)->get();

                return view('/admin/Coupon/Add')->with(['users'=>$users,'categories'=>$categories,'subcategories'=>$subcategories]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function AddSave(Request $request){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


        //dd($request);

        $checkCoupon = DB::table('sale_coupon')->where('code','=',$request->input('Coupon'))->first();

        if (empty($checkCoupon))

        {

            $coupon = new Coupon;

            $coupon->code = $request->input('Coupon');

            $coupon->amount = $request->input('amount');

            $coupon->max_use_times = $request->input('maxuse');
            $coupon->start_time = $request->input('starttime');
            $coupon->end_time = $request->input('endtime');

            $coupon->save();

            if($request->input('userallcheck') == 'on'){

                $coupon->fiusers = 0;


            }else{


                $coupon->fiusers =1;

                foreach ($request->input('usercheck') as $key=> $value){

                    DB::table('users_copoun')->insert(['copoun_id'=>$coupon->id,'user_id'=>$value]);

                }

            }

            if ($request->input('cateallcheck') == 'on'){
                $coupon->fisubcategory = 0;
            }else{

                $coupon->fisubcategory = 1;

                if (!empty($request->input('cateallcheck'))) {
                    foreach ($request->input('cateallcheck') as $key => $value) {

                        if ($value == 'on') {

                            $supCategories = DB::table('supcategorey')->where('catg_id', '=', $key)->get();

                            foreach ($supCategories as $supCategory) {


                                DB::table('subcategory_copoun')->insert(['copoun_id' => $coupon->id, 'subcategory_id' => $supCategory->id]);

                            }

                        }

                    }
                }
                if (!empty($request->input('subcateallcheck'))) {
                    foreach ($request->input('subcateallcheck') as $key => $value) {

                        foreach ($value as $sample => $data) {

                            DB::table('subcategory_copoun')->insert(['copoun_id' => $coupon->id, 'subcategory_id' => $data]);


                        }

                    }
                }
            }

            $coupon->save();

            $activity= 'has been Added Coupon: ' . $coupon->code .' with ID: ' . $coupon->id .' .';

            DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


            Session::flash('message', 'Coupon Added successfully');
            return Redirect::back();


        }else{

            Session::flash('message', 'Coupon Found Before');
            return Redirect::back();

        }


            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }

    }

    function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    function getIndex(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupons = DB::table('sale_coupon')->get();
                $orderItems = DB::table('shippingDetails')
                    ->join('orders', 'order_id', '=', 'orders.id')
                    ->select('shippingDetails.coupon',DB::raw('sum(orders.totalcoupon_dis) AS sums'))
                    ->groupBy('coupon')
                    ->get();

                $sumCoupon = [];

                foreach ($orderItems as $orderItem){

                    $sumCoupon[$orderItem->coupon] = $orderItem->sums;

                }

                return view('/admin/Coupon/View')->with(['coupons'=>$coupons,'sumCoupon'=>$sumCoupon]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function getDelete(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupons = DB::table('sale_coupon')->where('active','=',true)->get();


                return view('/admin/Coupon/Delete')->with(['coupons'=>$coupons]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function DeleteCoupon($id){
        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

            $coupon =  Coupon::findOrFail($id);
                $coupon->active = false;
                $coupon->save();


                $activity= 'has been Deactivated Coupon: ' . $coupon->code .' with ID: ' . $coupon->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                Session::flash('message', 'Coupon Deactivated successfully');
                return Redirect::back();


            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }


    }

    function getEdit(){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupons = DB::table('sale_coupon')->get();
                $orderItems = DB::table('shippingDetails')
                    ->join('orders', 'order_id', '=', 'orders.id')
                    ->select('shippingDetails.coupon',DB::raw('sum(orders.totalcoupon_dis) AS sums'))
                    ->groupBy('coupon')
                    ->get();

                $sumCoupon = [];

                foreach ($orderItems as $orderItem){

                    $sumCoupon[$orderItem->coupon] = $orderItem->sums;

                }

                return view('/admin/Coupon/Edit')->with(['coupons'=>$coupons,'sumCoupon'=>$sumCoupon]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }

    function ActiveCoupon($id){
        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupon =  Coupon::findOrFail($id);
                $coupon->active = true;
                $coupon->save();


                $activity= 'has been Activated Coupon: ' . $coupon->code .' with ID: ' . $coupon->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                Session::flash('message', 'Coupon Activated successfully');
                return Redirect::back();


            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }


    }

    function EditCouponAjax($id){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupon =  Coupon::findOrFail($id);

                $categories = DB::table('categorey')->get();
                $subcategories = DB::table('supcategorey')->get();

                $users=DB::table('users')->where('active','=',true)->get();

                $usersApplied=DB::table('users_copoun')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->where('users_copoun.copoun_id','=',$id)
                    ->select( 'users_copoun.*','users.name as name')->get();

                $categoriesApplied= DB::table('supcategorey')
                    ->join('categorey','catg_id','=','categorey.id')
                    ->join('subcategory_copoun','supcategorey.id','=','subcategory_copoun.subcategory_id')
                    ->where('subcategory_copoun.copoun_id','=',$id)
                    ->select('categorey.name as Cate','supcategorey.name as SubCate','subcategory_copoun.*')->get();


                return view('/admin/Coupon/EditAjax')->with(['users'=>$users,'categories'=>$categories,'subcategories'=>$subcategories,'coupon'=>$coupon,'usersApplied'=>$usersApplied,'categoriesApplied'=>$categoriesApplied]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }






    }

    function EditCouponSave(Request $request,$id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupon = Coupon::findOrFail($id);


                $coupon->code = $request->input('Coupon');

                $coupon->amount = $request->input('amount');

                $coupon->max_use_times = $request->input('maxuse');
                $coupon->start_time = $request->input('starttime');
                $coupon->end_time = $request->input('endtime');

                $coupon->save();

                if($request->input('userallcheck') == 'on'){

                    $coupon->fiusers = 0;


                }else{


                    $coupon->fiusers =1;

                    DB::table('users_copoun')->where('copoun_id','=',$id)->delete();


                    foreach ($request->input('usercheck') as $key=> $value){


                        DB::table('users_copoun')->insert(['copoun_id'=>$coupon->id,'user_id'=>$value]);

                    }

                }

                if ($request->input('cateallcheck') == 'on'){
                    $coupon->fisubcategory = 0;
                }else{

                    $coupon->fisubcategory = 1;

                    DB::table('subcategory_copoun')->where('copoun_id','=',$id)->delete();

                    if (!empty($request->input('cateallcheck'))){
                    foreach ($request->input('cateallcheck') as $key=> $value){

                        if ($value == 'on'){

                            $supCategories = DB::table('supcategorey')->where('catg_id','=',$key)->get();


                            foreach ($supCategories as $supCategory){


                                DB::table('subcategory_copoun')->insert(['copoun_id'=>$coupon->id,'subcategory_id'=>$supCategory->id]);

                            }

                        }

                    }
                    }
                    if (!empty($request->input('subcateallcheck'))) {
                        foreach ($request->input('subcateallcheck') as $key => $value) {

                            foreach ($value as $sample => $data) {

                                DB::table('subcategory_copoun')->insert(['copoun_id' => $coupon->id, 'subcategory_id' => $data]);


                            }

                        }
                    }
                }

                $coupon->save();

                $activity= 'has been Edit Coupon: ' . $coupon->code .' with ID: ' . $coupon->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Coupon Edited successfully');
                return redirect('/admin/Coupons/Edit');



            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }

    }


    function UserFilterAjax($id){



        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $usersApplied=DB::table('users_copoun')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->where('users_copoun.copoun_id','=',$id)
                    ->select( 'users_copoun.*','users.name as name')->get();

                return view('/admin/Coupon/UserFilter')->with(['usersApplied'=>$usersApplied]);

            }
            else {

                return view('NotAuth');

            }

        }
        else{

            return redirect('/login');
        }


            }



    function CateFilterAjax($id){



        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $categoriesApplied= DB::table('supcategorey')
                    ->join('categorey','catg_id','=','categorey.id')
                    ->join('subcategory_copoun','supcategorey.id','=','subcategory_copoun.subcategory_id')
                    ->where('subcategory_copoun.copoun_id','=',$id)
                    ->select('categorey.name as Cate','supcategorey.name as SubCate','subcategory_copoun.*')->get();


                return view('/admin/Coupon/CateFilter')->with(['categoriesApplied'=>$categoriesApplied]);

            }
            else {

                return view('NotAuth');

            }

        }
        else{

            return redirect('/login');
        }


    }


    function CouponItems($id){



        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $coupon = DB::table('sale_coupon')->where('id','=',$id)->first();

                $products = DB::table('product_details')
                    ->join('shippingDetails', 'product_details.id', '=', 'shippingDetails.pro_details_id')
                    ->join('products', 'product_details.prod_id', '=', 'products.id')
                    ->select('shippingDetails.*','product_details.*','products.*')->where('shippingDetails.coupon','=',$coupon->code)
                    ->get();

                return view('/admin/Coupon/Details')->with(['products'=>$products]);

            }
            else {

                return view('NotAuth');

            }

        }
        else{

            return redirect('/login');
        }


    }



}
