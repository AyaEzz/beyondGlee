<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller
{

    function getIndex(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $orders = DB::table('orders')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('shippedto_info', 'shippedTo_id', '=', 'shippedto_info.id')
                    ->select('shippedto_info.*','users.name as customerName','orders.*')
                    ->get();
                //dd($orders);
                return view('/admin/Orders/View')->with(['orders'=>$orders]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }


    function getOrderDetails($id){




        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $products = DB::table('product_details')
                    ->join('shippingDetails', 'product_details.id', '=', 'shippingDetails.pro_details_id')
                    ->join('products', 'product_details.prod_id', '=', 'products.id')
                    ->select('shippingDetails.*','product_details.*','products.*')->where('shippingDetails.order_id','=',$id)
                    ->get();

                //dd($products);
                return view('/admin/Orders/ViewDetails')->with(['products'=>$products]);

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


                $orders = DB::table('orders')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->join('shippedto_info', 'shippedTo_id', '=', 'shippedto_info.id')
                    ->select('shippedto_info.*','users.name as customerName','orders.*')
                    ->get();
                //dd($orders);
                return view('/admin/Orders/Edit')->with(['orders'=>$orders]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function editOrder(Request $request,$id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

        $order= DB::table('orders')->where('id','=',$id)->first();

        if ($request->get('status') != '') {
            $status = $request->get('status');
        }else {

            $status = $order->status;
        }

                $activity= 'has been Edit in Order with ID: ' . $order->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                DB::table('orders')->where('id','=',$id)->update(['status'=>$status]);

        Session::flash('message', 'Order Edited successfully');
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



}
