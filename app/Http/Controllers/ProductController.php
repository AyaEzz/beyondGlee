<?php

namespace App\Http\Controllers;
use App\LikeSession;
use App\Like;
use App\Review;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Redirect;

class ProductController extends Controller
{
    function getHome()
    {
        $recentProducts = DB::table('products')->orderBy('created_at' , 'desc')->where('active','=',true)->take(8)->get();
        $likedProducts = DB::table('products')->orderBy('likes' , 'desc')->where('active','=',true)->take(8)->get();
        $featuredProducts=DB::table('featured_products')
            ->join('products', 'prod_id', '=', 'products.id')
            ->select('products.*')->where('products.active','=',true)
            ->get();
        if (Auth::check()) {
            $user = Auth::user();
            $checkLikes = DB::table('likes')->where('user_id', '=', $user->id)->get();
            $likes = new LikeSession(null);
            foreach ($checkLikes as $like){

                $likes->add($like->prod_id);

            }



        }else{

            $oldLike = Session::has('like') ? Session::get('like') : null;
            $likes = new LikeSession($oldLike);

        }

        $instas = DB::table('instgram')
            ->join('products', 'prod_id', '=', 'products.id')
                ->select('instgram.*','products.name as prod_name')->where('products.active','=',true)
                ->get();




        return view('welcome')->with(['recentProducts'=>$recentProducts,'likedProducts'=>$likedProducts,'featuredProducts'=>$featuredProducts,'likes'=>$likes,'instas'=>$instas]);
    }

    function getCat($cat)
    {
        $id = DB::table('categorey')->where('name','=',$cat)->value('id');

        $products=DB::table('products')
            ->join('supcategorey', 'supCateg_id', '=', 'supcategorey.id')
            ->select('products.*','supcategorey.name as catName')->where([['supcategorey.catg_id','=',$id],['products.active','=',true]])->orderBy('products.created_at','desc')
            ->get();

        $catNameT=json_decode(json_encode($products), true);
        $catNameT=array_column ($catNameT,'catName');
        $catNames=array_unique($catNameT);

        if (Auth::check()) {
            $user = Auth::user();
            $checkLikes = DB::table('likes')->where('user_id', '=', $user->id)->get();
            $likes = new LikeSession(null);
            foreach ($checkLikes as $like){

                $likes->add($like->prod_id);

            }



        }else{

            $oldLike = Session::has('like') ? Session::get('like') : null;
            $likes = new LikeSession($oldLike);

        }


        return view('/layouts/catg')->with(['products' => $products,'catNames'=>$catNames,'likes'=>$likes]);
    }

    function getSubCat($cat,$subcat)
    {
        $id = DB::table('categorey')->where('name','=',$cat)->value('id');

        $products=DB::table('products')
            ->join('supcategorey', 'supCateg_id', '=', 'supcategorey.id')
            ->select('products.*','supcategorey.name as catName')->where([['supcategorey.catg_id','=',$id],['products.active','=',true]])->orderBy('products.created_at','desc')
            ->get();

        $catNameT=json_decode(json_encode($products), true);
        $catNameT=array_column ($catNameT,'catName');
        $catNames=array_unique($catNameT);


        if (Auth::check()) {
            $user = Auth::user();
            $checkLikes = DB::table('likes')->where('user_id', '=', $user->id)->get();
            $likes = new LikeSession(null);
            foreach ($checkLikes as $like){

                $likes->add($like->prod_id);

            }



        }else{

            $oldLike = Session::has('like') ? Session::get('like') : null;
            $likes = new LikeSession($oldLike);

        }

        return view('/layouts/scatg')->with(['products' => $products,'catNames'=>$catNames,'likes'=>$likes,'subcat'=>$subcat,'cat'=>$cat]);
    }

    function getProduct($id)
    {
        DB::table('products')->where('id','=',$id)->increment('views',1);
        $product = DB::table('products')->where([['id', '=', $id],['active','=',true]])->first();
        $product_Details= DB::table( 'product_details')->where([['prod_id','=',$id],['active','=',true]])->get();
        $tags=DB::table('pro_tags')
            ->join('tags', 'tag_id', '=', 'tags.id')
            ->select('pro_tags.*','tags.name as name')->where('pro_tags.prod_id','=',$id)
            ->get();

        $tagsT=json_decode(json_encode($tags), true);
        $tagsT=array_column ($tagsT,'id');
        $tagsID=array_unique($tagsT);

        if (Auth::check()) {

            $user = Auth::user();

            $whishlistProducts=DB::table('wishList')
                ->join('products', 'prod_id', '=', 'products.id')
                ->select('products.*')->where([['user_ID','=',$user->id],['prod_ID','=',$id],['products.active','=',true]])
                ->get();

            if ($whishlistProducts->count() > 0){

                $inWhishlist = true;

            }else{

                $inWhishlist = false;

            }

        }else{

            $inWhishlist = false;
        }






        $proTagsIdT=DB::table('pro_tags')
            ->join('tags', 'tag_id', '=', 'tags.id')
            ->select('pro_tags.prod_id')->whereIn('tags.id',$tagsID)
            ->get();


        $proTagsIdT=json_decode(json_encode($proTagsIdT), true);
        $proTagsId=array_column ($proTagsIdT,'prod_id');
        $proTagsId=array_unique($proTagsId);
        $similarProducts = DB::table('products')->whereIn('id',$proTagsId)->where([['id', '<>', $id],['active','=',true]])->get();


        $featuredProducts=DB::table('featured_products')
            ->join('products', 'prod_id', '=', 'products.id')
            ->select('products.*')->where('products.active','=',true)
            ->get();

        $colorst= DB::table( 'product_details')->select('color')->where([['prod_id','=',$id],['active','=',true]])->get();
        $category=DB::table('supcategorey')
            ->join('categorey', 'catg_id', '=', 'categorey.id')
            ->select('supcategorey.*','categorey.name as catName')->where('supcategorey.id','=',$product->supCateg_id)
            ->first();
        $reviews=DB::table('reviews')
            ->join('users', 'user_id', '=', 'users.id')
            ->select('reviews.*','users.name as writer')->where('reviews.prod_id','=',$id)
            ->get();


        $sizest= DB::table( 'product_details')->select('*')->where([['prod_id','=',$id],['active','=',true]])->orderBy('SizeNu','asc')->get();


       // $product_Details=json_encode($product_Details);


        return view('/layouts/singlePro')->with(['reviews'=>$reviews , 'product'=>$product,'tags'=>$tags,'product_Details'=>$product_Details,'colorst'=>$colorst,'sizest'=>$sizest,'category'=>$category,'similarProducts'=>$similarProducts,'featuredProducts'=>$featuredProducts,'inWhishlist'=>$inWhishlist]);

    }

    function getQuickView($id)
    {
        DB::table('products')->where('id','=',$id)->increment('views',1);
        $product = DB::table('products')->where([['id', '=', $id],['active','=',true]])->first();
        $product_Details= DB::table( 'product_details')->where([['prod_id','=',$id],['active','=',true]])->get();
        //$tags = DB::table('pro_tags')->where('prod_id', '=', $id)->get()->toArray();
        $tags=DB::table('pro_tags')
            ->join('tags', 'tag_id', '=', 'tags.id')
            ->select('pro_tags.*','tags.name as name')->where('pro_tags.prod_id','=',$id)
            ->get();


        $colorst= DB::table( 'product_details')->select('color')->where([['prod_id','=',$id],['active','=',true]])->get();
        $category=DB::table('supcategorey')
            ->join('categorey', 'catg_id', '=', 'categorey.id')
            ->select('supcategorey.*','categorey.name as catName')->where('supcategorey.id','=',$product->supCateg_id)
            ->first();

        if (Auth::check()) {

            $user = Auth::user();

            $whishlistProducts=DB::table('wishList')
                ->join('products', 'prod_id', '=', 'products.id')
                ->select('products.*')->where([['user_ID','=',$user->id],['prod_ID','=',$id],['products.active','=',true]])
                ->get();

            if ($whishlistProducts->count() > 0){

                $inWhishlist = true;

            }else{

                $inWhishlist = false;

            }

        }else{

            $inWhishlist = false;
        }

        $sizest= DB::table( 'product_details')->select('*')->where([['prod_id','=',$id],['active','=',true]])->orderBy('SizeNu','asc')->get();

        // $product_Details=json_encode($product_Details);


        return view('/layouts/QuickView')->with(['product'=>$product,'tags'=>$tags,'product_Details'=>$product_Details,'colorst'=>$colorst,'sizest'=>$sizest,'category'=>$category,'inWhishlist'=>$inWhishlist]);

    }

    function addReview (Request $request,$id)
    {


        if (Auth::check()) {

            $user = Auth::user();

            $checkLike = DB::table('reviews')->where([
                    ['user_ID', '=', $user->id],
                    ['prod_ID', '=', $id],
                ])->get();

            if ($checkLike->count()>0) {

                Session::flash('message','You Reviewed This Product before');
                return Redirect::back();

            }
            else{
                $user = Auth::user();
                $review = new Review;
                $review->prod_id = $id;
                $review->user_id = $user->id;
                $review->rate_value = $request->reviewrating;
                $review->comment = $request->reviewcomment;
                $review->save();

                $avgRate = DB::table('reviews')->where('prod_id','=',$id)->avg('rate_value');
                DB::table('products')->where('id','=',$id)->update(['avgreview'=>$avgRate]);

                DB::table('user_activity')->insert(['activity_id' => 1, 'user_id' => $user->id]);


                Session::flash('message', 'Review added successfully');
                return Redirect::back();

            }

        }
        else{

            return redirect('/login');

        }

    }

    function getShop ()
    {
        $recentProducts = DB::table('products')->orderBy('created_at' , 'desc')->where('active','=',true)->take(8)->get();
        if (Auth::check()) {
            $user = Auth::user();
            $checkLikes = DB::table('likes')->where('user_id', '=', $user->id)->get();
            $likes = new LikeSession(null);
            foreach ($checkLikes as $like){

                $likes->add($like->prod_id);

            }



        }else{

            $oldLike = Session::has('like') ? Session::get('like') : null;
            $likes = new LikeSession($oldLike);

        }
        return view('/layouts/shop')->with(['recentProducts'=>$recentProducts,'likes'=>$likes]);


    }


    function likeProduct(Request $request)
    {

        $id = $request->prod_ID;

        if ($request->liked == "true") {
            if (Auth::check()) {

                $user = Auth::user();

                $checkLike = DB::table('likes')->where([
                    ['user_id', '=', $user->id],
                    ['prod_id', '=', $id],
                ])->get();

                if ($checkLike->count() > 0) {

                    DB::table('likes')->where([
                        ['user_ID', '=', $user->id],
                        ['prod_ID', '=', $id],
                    ])->delete();

                    DB::table('products')->where('id', '=', $id)->decrement('likes', 1);

                    $product = DB::table('products')->where('id', '=', $id)->first();
                    return (['likesCount' => $product->likes]);


                }


            } else {

                $oldLike = Session::has('like') ? Session::get('like') : null;
                $like = new LikeSession($oldLike);
                $like->remove($id);
                $request->session()->put('like', $like);
                DB::table('products')->where('id', '=', $id)->decrement('likes', 1);
                $product = DB::table('products')->where('id', '=', $id)->first();
                return (['likesCount' => $product->likes]);


            }
        }
        else{
            if (Auth::check()) {

                $user = Auth::user();

                $checkLike = DB::table('likes')->where([
                    ['user_id', '=', $user->id],
                    ['prod_id', '=', $id],
                ])->get();

                if ($checkLike->count()>0) {

                    Session::flash('message','You Liked This Product before');
                    $product = DB::table('products')->where('id','=',$id)->first();
                    return (['likesCount'=>$product->likes]);


                }
                else{

                    DB::table('likes')->insert(['prod_id' => $id, 'user_id' => $user->id]);





                    DB::table('user_activity')->insert(['activity_id' => 2, 'user_id' => $user->id]);



                    DB::table('products')->where('id','=',$id)->increment('likes',1);
                    $product = DB::table('products')->where('id','=',$id)->first();

                    Session::flash('message', 'Product liked successfully');
                    return (['likesCount'=>$product->likes]);

                }

            }
            else{

                $oldLike = Session::has('like') ? Session::get('like') : null;
                $like = new LikeSession($oldLike);
                $like->add($id);
                $request->session()->put('like',$like);
                DB::table('products')->where('id','=',$id)->increment('likes',1);
                $product = DB::table('products')->where('id','=',$id)->first();
                return (['likesCount'=>$product->likes]);


            }
        }




    }

    function getSearch(Request $request){

        $search = $request->q;

        $ProductsName = DB::table('products')->where([['name','LIKE','%'.$search.'%'],['active','=',true]])->get();
        $ProductsDesc = DB::table('products')->where([['description','LIKE','%'.$search.'%'],['active','=',true]])->get();
        $ProductsTag = DB::table('pro_tags')
            ->join('tags', 'tag_id', '=', 'tags.id')
            ->select('pro_tags.*','tags.name as name')->where([['tags.name','LIKE','%'.$search.'%'],['active','=',true]])
            ->get();
        $searchProductsIDs=[];

        foreach ($ProductsName as $product){

            array_push($searchProductsIDs,$product->id);

        }
        foreach ($ProductsDesc as $product){

            array_push($searchProductsIDs,$product->id);

        }
        foreach ($ProductsTag as $product){

            array_push($searchProductsIDs,$product->prod_id);

        }


        $searchProductsIDs=array_unique($searchProductsIDs);

        $searchProducts = DB::table('products')->whereIn('id',$searchProductsIDs)->get();


        if (Auth::check()) {
            $user = Auth::user();
            $checkLikes = DB::table('likes')->where('user_id', '=', $user->id)->get();
            $likes = new LikeSession(null);
            foreach ($checkLikes as $like){

                $likes->add($like->prod_id);

            }



        }else{

            $oldLike = Session::has('like') ? Session::get('like') : null;
            $likes = new LikeSession($oldLike);

        }
        return view('/layouts/Search')->with(['searchProducts'=>$searchProducts,'likes'=>$likes]);




    }

}
