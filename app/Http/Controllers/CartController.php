<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Cart;
use App\Review;
use App\Shipping;
use App\wishList;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;
use Redirect;
use App\Order;
use App\Product;

class cartController extends Controller
{


    function addWishList (Request $request){
        if (Auth::check()) {

            $user = Auth::user();
            $foundbefore = DB::table('wishList')->where([
                ['user_ID', '=', $user->id],
                ['prod_ID', '=', $request->prodD_ID],
            ])->get();




            $wishListprod = new wishList;
            $wishListprod->prod_ID = $request->prodD_ID;
            $wishListprod->user_ID = $user->id;
            $wishListprod->save();



        }
        else{

            return redirect('/login');

        }
    }

    function addToCart(Request $request){
        $product = DB::table('product_details')
            ->join('products', 'product_details.prod_id', '=', 'products.id')
            ->select('products.*','product_details.size as size' , 'product_details.color as color','product_details.id as prodD_id','product_details.amount as maxAmount')->where([['product_details.id','=', $request->prodD_ID],['product_details.active','=',true]])
            ->first();
        $product->image = asset($product->image);
        $qty=$request->amount;
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $prodD_id = $request->prodD_ID;

        $olditem =false;

        if ( Session::has('cart'))
        {

        if (array_key_exists($prodD_id,$cart->items)){

            $olditem = true;


        }
        }



        $cart->add($request->prod_ID,$request->prodD_ID,$qty,$product);
        $price = $cart->items[$request->prodD_ID];
        $price = $price['price'];
        $quan = $qty;
        $request->session()->put('cart',$cart);
        return (['totalqty'=>$cart->totalqty,'totalPrice'=>$cart->totalPrice,'productUp'=>$product,'price'=>$price,'quan'=>$quan,'olditem'=>$olditem]);

    }

    function getWishList(){


        if (Auth::check()) {

            $user = Auth::user();

            $whishlistProducts=DB::table('wishList')
                ->join('products', 'prod_id', '=', 'products.id')
                ->select('products.*')->where([['user_ID', '=', $user->id],['products.active','=',true]])
                ->get();

            return view('/layouts/Wishlist')->with(['whishlistProducts'=>$whishlistProducts]);

        }
        else{

            return redirect('/login');

        }

    }


    function removeWishList($id){


        if (Auth::check()) {

            $user = Auth::user();


            DB::table('wishList')->where([
                ['user_ID', '=', $user->id],
                ['prod_ID', '=', $id],
            ])->delete();

            Session::flash('message', 'Product removed successfully from wishList');
            return Redirect::back();
        }
        else{

            return redirect('/login');

        }
    }


    function getCart(){


        if (Auth::check()) {

            $user = Auth::user();
        }else{

            $user='';
        }

        $shipping = DB::table('shipping')->get();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        if ($oldCart){
            $cart = new Cart($oldCart);

            $cartItems = $cart->items;

            $cartProdDId = array_column ($cartItems,'pordD_id');
            $totalPrice = $cart->totalPrice;

            $cartProducts=DB::table('product_details')
                ->join('products', 'product_details.prod_id', '=', 'products.id')
                ->select('products.*','product_details.size as size' , 'product_details.color as color','product_details.id as prodD_id','product_details.amount as maxAmount')->whereIn('product_details.id', $cartProdDId)
                ->get();
        }
        else{
            $cartProducts=[];
            $totalPrice = 0;
            $cart= null;

        }


        return view('/layouts/cart')->with(['cartProducts'=>$cartProducts,'totalPrice'=>$totalPrice,'cart'=>$cart,'shipping'=>$shipping,'user'=>$user]);


    }


    function removeCardList(Request $request ,$id){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);

        $request->session()->put('cart',$cart);



        Session::flash('message', 'Product removed successfully from cart');
        return Redirect::back();

    }

    function modifyCart(Request $request){

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        if ($request->val == 1){

            $item = $cart->items[$request->prodD_ID];

            if ($item['sale_copoun'] == null )
            {

                $cart->increment($request->prodD_ID);
                $request->session()->put('cart',$cart);
                $status = "succeeded";

            }else{

                $status = "faild";

            }
            $itemn = $cart->items[$request->prodD_ID];

            $itemQty = $itemn['qty'];
            $itemPrice = $itemn['price'];


        }
        else{

            $item = $cart->items[$request->prodD_ID];

            if ($item['sale_copoun'] == null )
            {

                $cart->decrement($request->prodD_ID);
                $request->session()->put('cart',$cart);
                $status = "succeeded";

            }else{

                $status = "faild";

            }

            $itemn = $cart->items[$request->prodD_ID];
            $itemQty = $itemn['qty'];
            $itemPrice = $itemn['price'];

        }



        return (['totalqty'=>$cart->totalqty,'totalPrice'=>$cart->totalPrice,'itemQty'=>$itemQty,'itemPrice'=>$itemPrice,'status'=>$status]);

    }

    function getCheckout(){
        if (Auth::check()) {
            if ( Session::has('cart')) {

                $shipping = DB::table('shipping')->get();

                $user = Auth::user();

                $shippedPrice = DB::table('shipping')->where('state','=',$user->state)->first();

                $oldCart = Session::has('cart') ? Session::get('cart') : null;

                $cart = new Cart($oldCart);

                $cartItems = $cart->items;

                $cartProdDId = array_column($cartItems, 'pordD_id');

                $totalDiscount = 0;

                foreach ($cartItems as $cartItem) {

                    if ($cartItem['item']->sale == 1) {

                        $totalDiscount = $totalDiscount + ($cartItem['item']->price * ($cartItem['item']->discount / 100));
                    }

                }


                $cartProducts = DB::table('product_details')
                    ->join('products', 'product_details.prod_id', '=', 'products.id')
                    ->select('products.*', 'product_details.size as size', 'product_details.color as color', 'product_details.id as prodD_id', 'product_details.amount as maxAmount')->whereIn('product_details.id', $cartProdDId)
                    ->get();

                //dd($cart);

                return view('/layouts/checkout')->with(['user'=>$user,'cartProducts' => $cartProducts, 'totalPrice' => $cart->totalPrice, 'cart' => $cart, 'shipping' => $shipping, 'totalDiscount' => $totalDiscount,'shippingPrice'=>$shippedPrice->price]);

            }
            else{

                return redirect('/');

            }
        }
        else{

            return redirect('/login');

        }

    }

    function setCheckout(Request $request){
        $user = Auth::user();

        $shippedId = DB::table( 'shippedto_info')->where([
            ['user_id', '=', $user->id],
            ['state', '=', $request->gover],
            ['address', '=', $request->address],
            ['phone1', '=', $request->phone],
            ['payment_method', '=', $request->poption],
        ])->get();

        if ($shippedId->isEmpty())
        {
            $shipped = new Shipping;
            $shipped->user_id = $user->id;
            $shipped->name = $request->pname;
            $shipped->country = $request->country;
            $shipped->state = $request->gover;
            $shipped->city = $request->parea;
            $shipped->address = $request->address;
            $shipped->delivered_time = $request->orderTime;
            $shipped->phone1 = $request->phone;
            $shipped->phone2 = $request->aphone;
            $shipped->notes = $request->notes;
            $shipped->payment_method = $request->poption;
            $shipped->save();
        }else{

            $shipped = Shipping::findOrFail($shippedId[0]->id);

        }

            $shippedPrice = DB::table('shipping')->where('state','=',explode('_',$shipped->state)[1])->first();

        do{
            $id = mt_rand(1000, 999999999);
            $order= DB::table('orders')->where( 'id','=',$id)->get();

        }while($order->count()>0);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($oldCart);
        //dd($cart);

        $order = new Order;

        $order->id = $id;
        $order->user_id = $user->id;
        $order->total_cost = $cart->totalPrice + $shippedPrice->price;
        $order->paid = 0;
        $order->status = "under revision";
        $order->shippedTo_id=$shipped->id;
        $order->totalcoupon_dis= $cart->tcoupondiscount;

        $order->save();
        if ($cart->tcoupondiscount != 0){

            DB::table('sale_coupon')->where('code','=',$cart->couponused)->increment('used_times');


        }


        $cartItems = $cart->items;

        $cartItemsReview = [];

        $total_Nprice =0;

        foreach ($cartItems as $cartitem)
        {

            DB::table('product_details')->where('id','=',$cartitem['pordD_id'])->decrement('amount',$cartitem['qty']);
            DB::table('products')->where('id','=',$cartitem['pord_id'])->decrement('total_amount',$cartitem['qty']);

            $total_Nprice = $total_Nprice + ($cartitem['qty'] * $cartitem['item']->price);

            DB::table('shippingDetails')->insert(['pro_details_id' => $cartitem['pordD_id'], 'user_id' => $user->id, 'quantity' => $cartitem['qty'] , 'order_id'=>$order->id,'total_Nprice'=> $cartitem['qty'] * $cartitem['item']->price,'total_price'=>$cartitem['price'],'coupon'=>$cartitem['sale_copoun']]);
            $cartItemsReview[$cartitem['pord_id']]=['name'=>$cartitem['item']->name,'pord_id'=>$cartitem['pord_id'],'image'=>$cartitem['item']->image];

            $soldprod = DB::table('sold_product')->where('prod_id','=',$cartitem['pord_id'])->first();
            if (!empty($soldprod)){

                DB::table('sold_product')->where('prod_id','=',$cartitem['pord_id'])->increment('amount',$cartitem['qty']);
            }else{

                DB::table('sold_product')->insert(['prod_id'=>$cartitem['pord_id'],'amount'=>$cartitem['qty']]);
            }


        }

        $order->total_discount = $total_Nprice - $cart->totalPrice;
        $order->save();

        $request->session()->put('review',$cartItemsReview);
        $request->session()->forget('cart');


        DB::table('user_activity')->insert(['activity_id' => 3, 'user_id' => $user->id]);


        Session::flash('message', 'Order has been created successfully 
        Please Review Items First');


        return redirect('/cartreview');



    }

    function getReview ()
    {


        if (Auth::check()) {

            $oldCart = Session::has('review') ? Session::get('review') : null;
            $cartItems=$oldCart;



                return view('/layouts/Review')->with(['cartItems'=>$cartItems]);

            }



    }


    function cartReview(Request $request){

        $oldCart = Session::has('review') ? Session::get('review') : null;
        $cartItems=$oldCart;

        foreach ($cartItems as $item){

            $rate = $request->input('reviewrating'.$item['pord_id']);
            $comment = $request->input('reviewcomment'.$item['pord_id']);
            if($rate <> null & $comment<> null){
                $this->addReview($item['pord_id'],$rate,$comment);
            }


        }

        $request->session()->forget('review');


        return redirect('/');




    }

    function skipCartReview(){



        session()->forget('review');


        return redirect('/');




    }




    function addReview ($id , $rate , $comment)
    {


        if (Auth::check()) {

            $user = Auth::user();

            $checkLike = DB::table('reviews')->where([
                ['user_ID', '=', $user->id],
                ['prod_ID', '=', $id],
            ])->get();

            if ($checkLike->count()>0) {


                return (['reviwed'=>true]);

            }
            else{

                $review = new Review;
                $review->prod_id = $id;
                $review->user_id = $user->id;
                $review->rate_value = $rate;
                $review->comment = $comment;
                $review->save();

                $avgRate = DB::table('reviews')->where('prod_id','=',$id)->avg('rate_value');
                DB::table('products')->where('id','=',$id)->update(['avgreview'=>$avgRate]);


                DB::table('user_activity')->insert(['activity_id' => 1, 'user_id' => $user->id]);


                return (['reviwed'=>false]);

            }

        }


    }

    function setCoupon (Request $request){

        if (Auth::check()) {

            $user = Auth::user();

        $Coupon = DB::table('sale_coupon')->where('code','=',$request->Coupon)->first();
        date_default_timezone_set('Africa/Cairo');
        $currentTime = date('Y-m-d h:i:s a', time());
        $status = '';
        //dd($currentTime , $Coupon->start_time , $Coupon->end_time);

        if(!empty($Coupon) && $Coupon->active) {

            if ($Coupon->fiusers == 0) {

                if ($Coupon->start_time <= $currentTime & $Coupon->end_time >= $currentTime) {

                    if ($Coupon->used_times < $Coupon->max_use_times) {


                        $oldCart = Session::has('cart') ? Session::get('cart') : null;

                        $cart = new Cart($oldCart);

                        $cartItems = $cart->items;

                        //dd($cart);

                        foreach ($cartItems as $cartitem) {

                            if ($Coupon->fisubcategory == 0)
                            {
                                if($cartitem['sale_copoun'] == null){

                                    $cart->setCopoun($cartitem['pordD_id'],$Coupon->amount,$Coupon->code);

                                    $status = "Sale Coupon have been applied successfully";
                                }else{

                                    $status= "Sale Coupon have been applied successfully Before";
                                }


                            }else{
                                $checkSubCategory=DB::table('subcategory_copoun')->where('subcategory_id','=',$cartitem['item']->supCateg_id)->first();

                                if (!empty($checkSubCategory)){

                                    if($cartitem['sale_copoun'] == null){

                                        $cart->setCopoun($cartitem['pordD_id'],$Coupon->amount,$Coupon->code);

                                        $status = "Sale Coupon have been applied successfully";
                                    }else{

                                        $status= "Sale Coupon have been applied successfully Before";
                                    }

                                }

                                else{

                                    $status = "Not Valid Coupon";
                                }


                            }


                        }


                        $request->session()->put('cart',$cart);

                    } else {

                        $status = "exceeded";

                    }

                } elseif ($Coupon->start_time > $currentTime) {

                    $status = "not started yet";

                } elseif ($Coupon->end_time < $currentTime) {

                    $status = "expired";

                }
            }

            else {

                $checkUser = DB::table('users_copoun')->where([['copoun_id','=',$Coupon->id],['user_id','=',$user->id]])->first();
                //dd($checkUser);
                if (!empty($checkUser)){

                    if ($Coupon->start_time <= $currentTime & $Coupon->end_time >= $currentTime) {

                        if ($Coupon->used_times < $Coupon->max_use_times) {


                            $oldCart = Session::has('cart') ? Session::get('cart') : null;

                            $cart = new Cart($oldCart);

                            $cartItems = $cart->items;
                            //dd($cart);

                            foreach ($cartItems as $cartitem) {

                                if ($Coupon->fisubcategory == 0)
                                {
                                    if($cartitem['sale_copoun'] == null){

                                        $cart->setCopoun($cartitem['pordD_id'],$Coupon->amount,$Coupon->code);

                                        $status = "Sale Coupon have been applied successfully";
                                    }else{

                                        $status= "Sale Coupon have been applied successfully Before";
                                    }


                                }else{
                                    $checkSubCategory=DB::table('subcategory_copoun')->where('subcategory_id','=',$cartitem['item']->supCateg_id)->first();

                                    if (!empty($checkSubCategory)){

                                        if($cartitem['sale_copoun'] == null){

                                            $cart->setCopoun($cartitem['pordD_id'],$Coupon->amount,$Coupon->code);

                                            $status = "Sale Coupon have been applied successfully";
                                        }else{

                                            $status= "Sale Coupon have been applied successfully Before";
                                        }

                                    }

                                    else{

                                        $status = "Not Valid Coupon";
                                    }


                                }


                            }


                            $request->session()->put('cart',$cart);


                        } else {

                            $status = "exceeded";

                        }

                    } elseif ($Coupon->start_time > $currentTime) {

                        $status = "not started yet";

                    } elseif ($Coupon->end_time < $currentTime) {

                        $status = "expired";

                    }
                }else {

                    $status = "Not Valid Coupon";
                }


            }

            } else {

                $status = "Not Valid Coupon";
            }


            Session::flash('message', $status);
            return Redirect::back();

        }
        else{

            return redirect('/login');
        }

    }

}
