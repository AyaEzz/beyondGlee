<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ShippingController extends Controller
{
    function getIndex(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $States = DB::table('shipping')->get();
                //dd($orders);
                return view('/admin/Shipping/Shipping')->with(['States'=>$States]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }


    }

    function EditState (Request $request,$id){




        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $shipping= DB::table('shipping')->where('id','=',$id)->first();

                if ($request->get('country') != '') {
                    $country = $request->get('country');
                }else {

                    $country = $shipping->country;
                }
                if ($request->get('state') != '') {
                    $state = $request->get('state');
                }else {

                    $state = $shipping->state;
                }
                if ($request->get('price') != '') {
                    $price = $request->get('price');
                }else {

                    $price = $shipping->price;
                }

                $activity= 'has been Edit in Shipping For State: ' . $shipping->state .' with ID: ' . $shipping->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                DB::table('shipping')->where('id','=',$id)->update(['country'=>$country,'state'=>$state,'price'=>$price]);

                Session::flash('message', 'State Edited successfully');
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

    function DeleteState($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $shipping = DB::table('shipping')->where('id','=',$id)->first();


                $activity= 'has been Delete in Distributor with State: ' . $shipping->state . ' with ID: '.$id.' .';


                DB::table('shipping')->where('id','=',$id)->delete();


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                Session::flash('message', 'State Deleteded successfully');
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

    function AddState (Request $request){




        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                if ($request->get('country') != '') {
                    $country = $request->get('country');
                }
                if ($request->get('state') != '') {
                    $state = $request->get('state');
                }
                if ($request->get('price') != '') {
                    $price = $request->get('price');
                }

                $activity= 'has been Add Shipping For State: ' . $state .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                DB::table('shipping')->insert(['country'=>$country,'state'=>$state,'price'=>$price]);

                Session::flash('message', 'State Added successfully');
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
