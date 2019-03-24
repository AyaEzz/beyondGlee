<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
   function getProfile($name){
       if (Auth::check()) {

           $user = DB::table('users')->where('name', '=', $name)->first();
           $activites = DB::table('user_activity')
               ->join('activity', 'activity_id', '=', 'activity.id')
               ->select('user_activity.*', 'activity.action as action', 'activity.point as point')->where('user_activity.user_id', '=', $user->id)
               ->get();
           $totalpoints = 0;
           foreach ($activites as $activity) {

               $totalpoints += $activity->point;

           }

           $reviews = DB::table('reviews')
               ->join('products', 'prod_id', '=', 'products.id')
               ->select('reviews.*', 'products.name as prodName', 'products.image as prodImg')->where('reviews.user_id', '=', $user->id)
               ->get();

           $orders = DB::table('orders')->where('user_id', '=', $user->id)->get();


           return view('/user/profile')->with(['user' => $user, 'activites' => $activites, 'totalpoints' => $totalpoints, 'reviews' => $reviews, 'orders' => $orders]);
       }

       else {

           return redirect('/login');

       }


   }

   function getorder($username , $orderid){

       $user = DB::table('users')->where('name','=',$username)->first();


       $orderItems = DB::table('shippingDetails')
           ->join('orders', 'order_id', '=', 'orders.id')
           ->join('product_details', 'pro_details_id', '=', 'product_details.id')
           ->select('shippingDetails.*','product_details.*','orders.created_at as ordertime','orders.status as status','orders.shippedTo_id as shippedTo_id','orders.total_cost as total_cost')->where([['shippingDetails.user_id','=',$user->id],['orders.id','=',$orderid]])
           ->get();

       $shippingDetails = DB::table('shippedto_info')->where([['user_id','=',$user->id],['id','=',$orderItems[0]->shippedTo_id]])->first();

       $cart = new Cart(null);


       foreach ($orderItems as $orderItem)
       {
           $product=DB::table( 'products')->where('id','=',$orderItem->prod_id)->first();

           $cart->add($orderItem->prod_id,$orderItem->pro_details_id,$orderItem->quantity,$product);



       }





            $orderTime= $orderItems[0]->ordertime;
            $orderstatus=$orderItems[0]->status;
            //dd($orderItems,$shippingDetails);





       return view ('/user/Myorder')->with(['orderItems'=>$orderItems,'orderid'=>$orderid,'orderTime'=>$orderTime,'orderstatus'=>$orderstatus,'allitems'=>$cart,'shippingDetails'=>$shippingDetails]);

   }


   function edituser (){


       $user = Auth::user();


       return view('/user/editprofile')->with(['user'=>$user]);
   }

   function updateUser (Request $request){


       $user = Auth::user();

       $name       = $request->get('name');
       $email          = $request->get('email');
       $firstname    = $request->get('firstname');
       $lastname     = $request->get('lastname');
       $address     = $request->get('address');
       $state                = $request->get('state');
       $country     = $request->get('country');

       $phone     = $request->get('phone');
       $birthday     = $request->get('birthday');


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

       $user->save();

       /*
         Return a response that the user was updated successfully.
       */
return redirect()->back();


   }



}
