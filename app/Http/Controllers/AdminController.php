<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{



    function getAdminPanel(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $totalUsers = DB::table('users')->count();
                $newUsers = DB::table('users')->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-7 days')) )->count();
                $deliveredOrders = DB::table('orders')->where('status','=','Delivered')->count();
                $Orders = DB::table('orders')->count();
                $PendingOrders = DB::table('orders')->where('status','=','under revision')->count();
                $OnlineOrders = DB::table('orders')->where('status','=','Shipping')->count();

                $ordersPricesT = DB::table('orders')->whereDate('created_at', '>=', date('Y-m-d H:i:s',strtotime('-60 days')) )->take(16)->get(['id','total_cost']);

                $ordersPrice = array();

                foreach ($ordersPricesT as $ordersPriceT)
                {

                    array_push($ordersPrice,array('y'=>$ordersPriceT->total_cost,'label'=>$ordersPriceT->id));

                }


                $categories = DB::table('sold_product')
                    ->join('products', 'sold_product.prod_id', '=', 'products.id')
                    ->join('supcategorey', 'products.supCateg_id', '=', 'supcategorey.id')
                    ->join('categorey','supcategorey.catg_id','=','categorey.id')
                    ->select('supcategorey.name as SubCate','categorey.name as Cate',DB::raw('sum(sold_product.amount) AS sums'))
                    ->groupBy('supcategorey.id')->orderBy('sums','desc')->take(8)
                    ->get();

                $categoriesStat=array();

                foreach ($categories as $category)
                {

                    array_push($categoriesStat,array('y'=>$category->sums,'label'=>$category->Cate.'=>'.$category->SubCate));

                }



                //dd($categoriesStat);

                $activity= 'has been loged on adminpanel';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                return view('/admin/adminpanel')->with(['totalUsers'=>$totalUsers,'newUsers'=>$newUsers,'deliveredOrders'=>$deliveredOrders,'Orders'=>$Orders,'PendingOrders'=>$PendingOrders,'OnlineOrders'=>$OnlineOrders,'ordersPrice'=>$ordersPrice,'categoriesStat'=>$categoriesStat]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function getActivity(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id == 1){

                $activities = DB::table('admin_activity')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->select('users.*','admin_activity.*')
                    ->get();

                return view('/admin/Activity')->with(['activities'=>$activities]);


            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }

    }


    function getAdduserPanel(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id == 1){
                $users=DB::table('users')->where('active','=',true)->get();

                return view('/admin/users/adduser')->with(['users'=>$users]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function addUser(Request $request){

        if (Auth::check()) {





            $authuser = Auth::user();

            if($authuser->role_id == 1){


                $user = new User;

                $name       = $request->get('uname');
                $email          = $request->get('email');
                $firstname    = $request->get('fname');
                $lastname     = $request->get('lname');
                $address     = $request->get('address');
                $state                = $request->get('state');
                $country     = $request->get('country');

                $phone     = $request->get('phone');
                $birthday     = $request->get('birthday');
                $title = $request->get('title');
                $password = $request->get('title');




                /*
                  Ensure the user has entered a favorite coffee
                */
                if( $name != '' ){
                    $user->name    = $name;
                }

                /*
                  Ensure the user has entered some flavor notes
                */
                if( $email != '' ){
                    $user->email       = $email;
                }

                /*
                  Ensure the user has submitted a profile visibility update
                */


                /*
                  Ensure the user has entered something for city.
                */
                if( $firstname != '' ){
                    $user->firstname   = $firstname;
                }


                if( $lastname != '' ){
                    $user->lastname   = $lastname;
                }


                if( $address != '' ){
                    $user->address   = $address;
                }

                /*
                  Ensure the user has entered something for state
                */
                if( $state != '' ){
                    $user->state  = $state;
                }


                if( $country != '' ){
                    $user->country   = $country;
                }


                if( $phone != '' ){
                    $user->phone   = $phone;
                }


                if( $birthday != '' ){
                    $user->birthday   = $birthday;
                }

                if( $title != '' ){
                    $user->title   = $title;
                }

                if( $password != '' ){
                    $user->password   = $password;
                }


                $user->save();

                $activity= 'has been Added User : ' . $user->name . '.';

                DB::table('admin_activity')->insert(['user_id'=>$authuser->id,'activity'=>$activity]);

                return redirect()->back();

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }

    function getEdituserPanel()
    {

        if (Auth::check()) {

            $users = DB::table('users')->where('active','=',true)->get();


            $user = Auth::user();

            if($user->role_id == 1){

                return view('/admin/users/edituser')->with(['users' => $users]);

            } else {

                return view('NotAuth');

            }


        } else {

            return redirect('/login');
        }


    }


    function getQuickEdit($id){

        $user = DB::table('users')->where('id','=',$id)->first();

        return view('admin/users/edituserajax')->with(['user'=>$user]);

    }


    function editUser(Request $request,$id){

        if (Auth::check()) {





            $authuser = Auth::user();

            if($authuser->role_id == 1){

        $user = User::findOrFail($id);

        $name       = $request->get('uname');
        $email          = $request->get('email');
        $firstname    = $request->get('fname');
        $lastname     = $request->get('lname');
        $address     = $request->get('address');
        $state                = $request->get('state');
        $country     = $request->get('country');

        $phone     = $request->get('phone');
        $birthday     = $request->get('birthday');
        $title = $request->get('title');
        $password = Hash::make($request->get('title'));

        /*
          Ensure the user has entered a favorite coffee
        */
        if( $name != '' ){
            $user->name    = $name;
        }

        /*
          Ensure the user has entered some flavor notes
        */
        if( $email != '' ){
            $user->email       = $email;
        }

        /*
          Ensure the user has submitted a profile visibility update
        */


        /*
          Ensure the user has entered something for city.
        */
        if( $firstname != '' ){
            $user->firstname   = $firstname;
        }


        if( $lastname != '' ){
            $user->lastname   = $lastname;
        }


        if( $address != '' ){
            $user->address   = $address;
        }

        /*
          Ensure the user has entered something for state
        */
        if( $state != '' ){
            $user->state  = $state;
        }


        if( $country != '' ){
            $user->country   = $country;
        }


        if( $phone != '' ){
            $user->phone   = $phone;
        }


        if( $birthday != '' ){
            $user->birthday   = $birthday;
        }

        if( $title != '' ){
            $user->title   = $title;
        }

        if( $password != '' ){
            $user->password   = $password;
        }


        $user->save();


                $activity= 'has been Edited User : ' . $user->name . '.';

                DB::table('admin_activity')->insert(['user_id'=>$authuser->id,'activity'=>$activity]);

        return redirect()->back();
            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }


    }

    function getDeleteUserPanel(){

        if (Auth::check()) {

            $users = DB::table('users')->where('active','=',true)->get();


            $user = Auth::user();

            if($user->role_id == 1){

                return view('/admin/users/removeuser')->with(['users' => $users]);

            } else {

                return view('NotAuth');

            }


        } else {

            return redirect('/login');
        }




    }

    function removeUserConfirm($id){


            $user = DB::table('users')->where('id','=',$id)->first(['id','name']);


            return view('admin/users/deluserajax')->with(['user'=>$user]);


    }

    function removeUser($id){

        if (Auth::check()) {





            $authuser = Auth::user();

            if($authuser->role_id == 1){
                $user = User::findOrFail($id);

            DB::table('users')->where('id','=',$id)->update(['active'=>false]);

                $activity= 'has been Deactivated User : ' . $user->name . '.';

                DB::table('admin_activity')->insert(['user_id'=>$authuser->id,'activity'=>$activity]);

            Session::flash('message', 'user removed successfully');
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

    function getUserRole(){


        if (Auth::check()) {

            $users = DB::table('users')->get();


            $user = Auth::user();

            if($user->role_id == 1){

                $users = DB::table('users')
                    ->join('roles', 'role_id', '=', 'roles.id')
                    ->select('users.*','roles.name as roleName')->where('active','=',true)->get();

                return view('/admin/users/userRole')->with(['users' => $users]);


            } else {

                return view('NotAuth');

            }


        } else {

            return redirect('/login');
        }

    }

    function userRoleAjax($id){


        $user = User::findOrFail($id);

        $roles = DB::table('roles')->get();


        return view('admin/users/userroleajax')->with(['user' => $user,'roles'=>$roles]);


    }

    function changeUserRole(Request $request,$id)
    {

        if (Auth::check()) {


            $authuser = Auth::user();

            if ($authuser->role_id == 1) {


                $user = User::findOrFail($id);

                $user->role_id = $request->get('role');

                $user->save();

                $role = DB::table('roles')->where('id','=',$request->get('role'))->first();

                $activity= 'has been Change User : ' . $user->name . ' Role to '.$role->name.' .';

                DB::table('admin_activity')->insert(['user_id'=>$authuser->id,'activity'=>$activity]);


                Session::flash('message', 'user removed successfully');
                return Redirect::back();
            } else {

                return view('NotAuth');

            }


        } else {

            return redirect('/login');
        }
    }


    //
}
