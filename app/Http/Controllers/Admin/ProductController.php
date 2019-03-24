<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\ProductDetails;
use App\Tags;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class ProductController extends Controller
{

    function getIndex(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $products = DB::table('supcategorey')
                    ->join('categorey', 'catg_id', '=', 'categorey.id')
                    ->join('products', 'supcategorey.id', '=', 'products.supCateg_id')
                    ->select('products.*','supcategorey.name as SubCategoryName','categorey.name as CategoryName')
                    ->where('products.active','=',true)
                    ->get();
                //dd($products);
                return view('/admin/Product/View')->with(['products'=>$products]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }

    function getAdd(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $categories = DB::table('categorey')->get();
                $subcategories = DB::table('supcategorey')->get();
                return view('/admin/Product/add')->with(['categories'=>$categories,'subcategories'=>$subcategories]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function add(Request $request){


        //dd($request);

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){



                $product = new Product;

        $name      = $request->get('name');
        $description      = $request->get('description');
        $category      = $request->get('category');
        $sale      = $request->get('sale');
        if ($sale == 'on'){
            $sale = 1;
        }
        else{
            $sale=0;
        }
        $discount      = $request->get('discount');
        $featured     = $request->get('featured');
        $price     = $request->get('price');
        $addinfo     = '';
        $mimage      = $request->file('mimage');

        $destPath = $category.'/' .$name.'/';

        if(!empty($mimage)){
        $mimagename = $mimage->getClientOriginalName();
        $mimage->move($destPath , $mimagename);

        $mainImage=$destPath.$mimagename;

        }
        $addImages='';

        if($request->file('aimage'))
        {
            $count = count($request->file('aimage'));
            $x=0;
            foreach($request->file('aimage') as $aimage)
            {
                if(!empty($aimage))
                {

                    $filename = $aimage->getClientOriginalName();
                    $aimage->move($destPath, $filename);

                    $addImage = $destPath.$filename;
                    $addImages = $addImages.$addImage;
                    $x++;
                    if ($x!=$count){

                        $addImages = $addImages.'*';

                    }

                }
            }
        }

        $i2=1;
        do{


            $feature = $request->get('feature'.$i2);
            $value = $request->get('value'.$i2);

            $addinfo = $addinfo . $feature .':'.$value;
            $i2++;
            $key2 = 'snum'.$i2;
            if ($request->get($key2)){
                $addinfo = $addinfo.';';
            }

        }while($request->get($key2));

        /*
          Ensure the user has entered a favorite coffee
        */
        if( $name != '' ){
            $product->name    = $name;
        }

        if( $description != '' ){
            $product->description    = $description;
        }

        if( $category != '' ){
            $product->supCateg_id    = $category;
        }

        if( $sale != '' ){
            $product->sale    = $sale;
        }

        if( $discount != '' ){
            $product->discount    = $discount;
        }

        if( $price != '' ){
            $product->price    = $price;
        }

        if( $addinfo != '' ){
            $product->add_info    = $addinfo;
        }

        if( $mainImage != '' ){
            $product->image    = $mainImage;
        }

        if( $addImages != '' ){
            $product->add_images    = $addImages;
        }

        $product->save();

        $i=1;
        do{

            $productDetails = new ProductDetails;

            $productDetails->prod_id=$product->id;

            $snum=$request->get('snum'.$i);
            $amount=$request->get('amount'.$i);
            $color=$request->get('color'.$i);
            $size=$request->get('size'.$i);
            $osize=$request->get('osize'.$i);


            if( $snum != '' ){
                $productDetails->serial_no    = $snum;
            }

            if( $amount != '' ){
                $productDetails->amount    = $amount;
            }
            if( $color != '' ){
                $productDetails->color    = $color;
            }
            if( $size != '' ){
                $productDetails->size    = $size;
            }

            if( $osize != '' ){
                $productDetails->SizeNu    = $osize;
            }

            $productDetails->save();

            $i++;
            $key = 'snum'.$i;
        }while($request->get($key));

        $count = DB::table('product_details')
            ->select( DB::raw('Sum(amount) as total'))
            ->where('prod_id','=',$productDetails->prod_id)
            ->first();


        $product->total_amount = $count->total;

        $product->save();

        if ($featured == 'on'){

            DB::table('featured_products')->insert(['prod_id' => $product->id]);


        }

        $i=1;
        do{


            $tag = DB::table('tags')->where('name','=',$request->get('tag'.$i))->first();

            if( !empty($tag)){

                DB::table('pro_tags')->insert(['prod_id'=>$product->id,'tag_id'=>$tag->id]);

            }else{

                $tag = new Tags;
                $tag->name = $request->get('tag'.$i);
                $tag->save();
                DB::table('pro_tags')->insert(['prod_id'=>$product->id,'tag_id'=>$tag->id]);


            }



            $i++;
            $key = 'tag'.$i;
        }while($request->get($key));

                $activity= 'has been Added Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Product Added successfully');
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

    function getDelete(){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $products = DB::table('supcategorey')
                    ->join('categorey', 'catg_id', '=', 'categorey.id')
                    ->join('products', 'supcategorey.id', '=', 'products.supCateg_id')
                    ->select('products.*','supcategorey.name as SubCategoryName','categorey.name as CategoryName')
                    ->where('products.active','=',true)
                    ->get();
                //dd($products);
                return view('/admin/Product/remove')->with(['products'=>$products]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }





    }

    function DeleteProduct($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){




                $product_Details= DB::table('product_details')
            ->join('products', 'product_details.prod_id', '=', 'products.id')
            ->select('products.*','product_details.size as size' , 'product_details.color as color','product_details.id as prodD_id','product_details.amount as maxAmount','product_details.serial_no as serial_no')->where('products.id', $id)
            ->where('product_details.active','=',true)
            ->get();

        if (count($product_Details)>0){


            $tags = DB::table('pro_tags')
                ->join('tags', 'pro_tags.tag_id', '=', 'tags.id')
                ->select('pro_tags.*','tags.name as name')
                ->where('prod_id','=',$id)
                ->get();


            return view('/admin/Product/removeajax')->with(['products'=>$product_Details,'tags'=>$tags]);



        }
        else{


            $product = Product::findOrFail($id);
            $product->active=false;
            $product->total_amount=0;
            $product->save();

            $activity= 'has been Delete Product: ' . $product->name .' with ID: ' . $product->id .' .';

            DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



            Session::flash('message', 'Product removed successfully');
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

    function DeleteSubProduct($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                //DB::table('product_details')->where('id', '=', $id)->update([['active'=>false],['amount'=>0]]);
        $productDetails = ProductDetails::findOrFail($id);
        $productDetails->active=false;
        $productDetails->amount=0;
        $productDetails->save();
        $count = DB::table('product_details')
            ->select( DB::raw('Sum(amount) as total'))
            ->where('prod_id','=',$productDetails->prod_id)
            ->first();

        $product = Product::findOrFail($productDetails->prod_id);

        $product->total_amount = $count->total;

        $product->save();

                $activity= 'has been Delete SubProduct in Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'SubProduct removed successfully');
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

    function DeleteTagProduct ($prod_id,$tag_id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

        DB::table('pro_tags')->where([['prod_id','=',$prod_id],['tag_id','=',$tag_id]])->delete();

                $product = Product::findOrFail($prod_id);


                $activity= 'has been Delete Tag ID: ' . $tag_id .' in Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Tag removed successfully');
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



                $products = DB::table('supcategorey')
                    ->join('categorey', 'catg_id', '=', 'categorey.id')
                    ->join('products', 'supcategorey.id', '=', 'products.supCateg_id')
                    ->select('products.*','supcategorey.name as SubCategoryName','categorey.name as CategoryName')
                    ->where('products.active','=',true)
                    ->get();
                //dd($products);
                return view('/admin/Product/edit')->with(['products'=>$products]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }





    }


    function EditProductAjax($id){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

        $categories = DB::table('categorey')->get();
        $subcategories = DB::table('supcategorey')->get();

        $product = DB::table('products')->where('id', '=', $id)->first();

        $info = $product->add_info;
        $add_info = (explode(";", $info));
        $count = count($add_info);

        $tags = DB::table('pro_tags')
            ->join('tags', 'pro_tags.tag_id', '=', 'tags.id')
            ->select('pro_tags.*','tags.name as name')
            ->where('prod_id','=',$product->id)
            ->get();



        return view('/admin/Product/editajax')->with(['product'=>$product,'categories'=>$categories,'subcategories'=>$subcategories,'add_info'=>$add_info,'count'=>$count,'tags'=>$tags]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }

    function EditProductAjaxSave(Request $request, $id){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                //dd($request);
                $product = Product::findOrFail($id);
        $name      = $request->get('name');
        $description      = $request->get('description');
        $category      = $request->get('category');
        $sale      = $request->get('sale');
        if ($sale == 'on'){
            $sale = 1;
        }
        else{
            $sale=0;
        }
        $discount      = $request->get('discount');
        $featured     = $request->get('featured');
        $price     = $request->get('price');
        $addinfo     = '';
        $mimage      = $request->file('mimage');

        $destPath = $category.'/' .$name.'/';

        if(!empty($mimage)){
            $mimagename = $mimage->getClientOriginalName();
            $mimage->move($destPath , $mimagename);

            $mainImage=$destPath.$mimagename;

        }else{

            $mainImage=$product->image;
        }
        $addImages='';

        if($request->file('aimage'))
        {
            $count = count($request->file('aimage'));
            $x=0;
            foreach($request->file('aimage') as $aimage)
            {
                if(!empty($aimage))
                {

                    $filename = $aimage->getClientOriginalName();
                    $aimage->move($destPath, $filename);

                    $addImage = $destPath.$filename;
                    $addImages = $addImages.$addImage;
                    $x++;
                    if ($x!=$count){

                        $addImages = $addImages.'*';

                    }

                }
            }
        }

        $i2=1;
        do{


            $feature = $request->get('feature'.$i2);
            $value = $request->get('value'.$i2);

            $addinfo = $addinfo . $feature .':'.$value;
            $i2++;
            $key2 = 'snum'.$i2;
            if ($request->get($key2)){
                $addinfo = $addinfo.';';
            }

        }while($request->get($key2));

        /*
          Ensure the user has entered a favorite coffee
        */
        if( $name != '' ){
            $product->name    = $name;
        }

        if( $description != '' ){
            $product->description    = $description;
        }

        if( $category != '' ){
            $product->supCateg_id    = $category;
        }

        if( $sale != '' ){
            $product->sale    = $sale;
        }

        if( $discount != '' ){
            $product->discount    = $discount;
        }

        if( $price != '' ){
            $product->price    = $price;
        }

        if( $addinfo != '' ){
            $product->add_info    = $addinfo;
        }

        if( $mainImage != '' ){
            $product->image    = $mainImage;
        }

        if( $addImages != '' ){
            $product->add_images    = $addImages;
        }

        $product->save();

        if ($featured == 'on'){

            DB::table('featured_products')->insert(['prod_id' => $product->id]);


        }

        $i=1;
        do{


            $tag = DB::table('tags')->where('name','=',$request->get('tag'.$i))->first();



            if( !empty($tag)){

                $tagPro =  DB::table('pro_tags')->where([['prod_id','=',$product->id],['tag_id','=',$tag->id]])->first();

                if( empty($tagPro)){

                    DB::table('pro_tags')->insert(['prod_id'=>$product->id,'tag_id'=>$tag->id]);
                }

            }else{

                $tag = new Tags;
                $tag->name = $request->get('tag'.$i);
                $tag->save();
                DB::table('pro_tags')->insert(['prod_id'=>$product->id,'tag_id'=>$tag->id]);


            }



            $i++;
            $key = 'tag'.$i;
        }while($request->get($key));


                $activity= 'has been Edit Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                Session::flash('message', 'Product edited successfully');
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

    function EditSubProduct($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

        $product_Details= DB::table('product_details')
            ->join('products', 'product_details.prod_id', '=', 'products.id')
            ->select('products.*','product_details.SizeNu as sizeOr' ,'product_details.size as size' , 'product_details.color as color','product_details.id as prodD_id','product_details.amount as maxAmount','product_details.serial_no as serial_no')->where('products.id', $id)
            ->where('product_details.active','=',true)
            ->get();

        return view('/admin/Product/editsubajax')->with(['products'=>$product_Details]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }

    }

    function EditSubProductSave(Request $request,$id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

        //dd($request,$id);
        $productDetails = ProductDetails::findOrFail($id);



        $snum=$request->get('snum');
        $amount=$request->get('amount');
        if ($request->get('color')){

            $color=$request->get('color');
        } else
        {
            $color='';
        }


        $size=$request->get('size');
        $osize=$request->get('osize');


        if( $snum != '' ){
            $productDetails->serial_no    = $snum;
        }

        if( $amount != '' ){
            $productDetails->amount    = $amount;
        }
        if( $color != '' ){
            $productDetails->color    = $color;
        }
        if( $size != '' ){
            $productDetails->size    = $size;
        }

        if( $osize != '' ){
            $productDetails->SizeNu    = $osize;
        }

        $productDetails->save();

        $count = DB::table('product_details')
            ->select( DB::raw('Sum(amount) as total'))
            ->where('prod_id','=',$productDetails->prod_id)
            ->first();

        $product = Product::findOrFail($productDetails->prod_id);

        $product->total_amount = $count->total;

        $product->save();


                $activity= 'has been Edit SubProduct ID:' . $productDetails->id .' in Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                Session::flash('message', 'SubProduct edited successfully');
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

    function AddSubProductSave(Request $request,$id){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){
        //dd($request,$id);

        $productDetails = new ProductDetails;

        $productDetails->prod_id=$id;

        $snum=$request->get('snum');
        $amount=$request->get('amount');
        $color=$request->get('color');
        $size=$request->get('size');
        $osize=$request->get('osize');


        if( $snum != '' ){
            $productDetails->serial_no    = $snum;
        }

        if( $amount != '' ){
            $productDetails->amount    = $amount;
        }
        if( $color != '' ){
            $productDetails->color    = $color;
        }
        if( $size != '' ){
            $productDetails->size    = $size;
        }

        if( $osize != '' ){
            $productDetails->SizeNu    = $osize;
        }

        $productDetails->save();

        $count = DB::table('product_details')
            ->select( DB::raw('Sum(amount) as total'))
            ->where('prod_id','=',$productDetails->prod_id)
            ->first();

        $product = Product::findOrFail($productDetails->prod_id);

        $product->total_amount = $count->total;

        $product->save();

                $activity= 'has been add SubProduct ID:' . $productDetails->id .' in Product: ' . $product->name .' with ID: ' . $product->id .' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'SubProduct Add successfully');
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

    function getReviews($id){



        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){



                $product = DB::table('products')
                    ->where('id','=',$id)
                    ->first();

                $reviews = DB::table('reviews')
                    ->join('users', 'user_id', '=', 'users.id')
                    ->select('reviews.*','users.name as reviewer')
                    ->where('reviews.prod_id','=',$id)
                    ->get();

                //dd($products);

                return view('/admin/Product/reviewes')->with(['product'=>$product,'reviews'=>$reviews]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }

    function DeleteReview($id){
        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $review = DB::table('reviews')->where('id','=',$id)->first();

                $activity= 'has been delete Review ID:' . $id .' in Product: ' . $review->prod_id .' .';


                DB::table('reviews')->where('id','=',$id)->delete();


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Review removed successfully');
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

    function getInstagram(){



    if (Auth::check()) {

        $user = Auth::user();

        if($user->role_id != 3){

            $instagrams = DB::table('instgram')
                ->join('products', 'prod_id', '=', 'products.id')
                ->select('instgram.*','products.image as image','products.name as name')
                ->get();
            $products= DB::table('products')->where('active','=',true)->get();


            //dd($instagrams);

            return view('/admin/Product/Instagram')->with(['instagrams'=>$instagrams,'products'=>$products]);

        }
        else {

            return view('NotAuth');

        }



    }
    else{

        return redirect('/login');
    }



}


    function addInstagram(Request $request)
    {


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

    if ($request->get('product') != '') {
        $prod_id = $request->get('product');
    }

    if ($request->get('url') != '') {
        $url = $request->get('url');

    }

    //dd($request);

    DB::table('instgram')->insert(['url'=>$url,'prod_id'=>$prod_id]);

                $activity= 'has been add Instagaram in Product: ' . $prod_id .' .';


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                Session::flash('message', 'URL Added successfully');
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

    function getEditInstagram($id){



        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){

                $instagram = DB::table('instgram')
                    ->join('products', 'prod_id', '=', 'products.id')
                    ->select('instgram.*','products.image as image','products.name as name')
                    ->where('instgram.id','=',$id)
                    ->first();
                $products= DB::table('products')->where('active','=',true)->get();


                //dd($instagrams);

                return view('/admin/Product/editinstagram')->with(['instagram'=>$instagram,'products'=>$products]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function setEditInstagram(Request $request,$id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $instagram = DB::table('instgram')
            ->where('id','=',$id)
            ->first();

        if ($request->get('product') != '') {
            $prod_id = $request->get('product');
        }else {

            $prod_id = $instagram->prod_id;
        }

        if ($request->get('url') != '') {
            $url = $request->get('url');

        }else {

            $url = $instagram->url;
        }

        //dd($request);

        DB::table('instgram')->where('id','=',$id)->update(['url'=>$url,'prod_id'=>$prod_id]);

                $activity= 'has been edit Instagaram ID:' . $id .' in Product: ' . $prod_id .' .';


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);




                Session::flash('message', 'URL Edited successfully');
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

    function DeleteInstagram($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $activity= 'has been delete Instagaram ID:' . $id .' .';


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);



                DB::table('instgram')->where('id','=',$id)->delete();


        Session::flash('message', 'URL removed successfully');
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
