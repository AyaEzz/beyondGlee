<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
   function getIndex(){



       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){



               $categories = DB::table('categorey')->get();
               //dd($products);
               return view('/admin/Category/Categories')->with(['categories'=>$categories]);

           }
           else {

               return view('NotAuth');

           }



       }
       else{

           return redirect('/login');
       }




   }

   function EditCategoryAjax($id){


       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){


               $category = DB::table('categorey')->where('id','=',$id)->first();
               //dd($category);
               return view('/admin/Category/edit')->with(['category'=>$category]);

           }
           else {

               return view('NotAuth');

           }



       }
       else{

           return redirect('/login');
       }



   }


   function EditCategoryAjaxSave (Request $request , $id){


       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

       $name      = $request->get('name');
       $order_num      = $request->get('order_num');

       //dd($request,$id,$name,$order_num);

       DB::table('categorey')->where('id','=',$id)->update(['name'=>$name,'order_num'=>$order_num]);

               $activity= 'has been Edit in Category : ' . $name . ' with ID: '.$id.' .';

               DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


               Session::flash('message', 'Category edited successfully');
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

   function AddCategory(Request $request){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

       $name      = $request->get('name');
       $order_num      = $request->get('order_num');
       $category = DB::table('categorey')->where('name','=',$name)->first();

       if (empty($category)){

           DB::table('categorey')->insert(['name'=>$name,'order_num'=>$order_num]);

           $category = DB::table('categorey')->where('name','=',$name)->first();


           $activity= 'has been Add Category : ' . $name . ' with ID: '.$category->id.' .';

           DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


           Session::flash('message', 'Category Added successfully');
           return Redirect::back();


       }else{
           Session::flash('message', 'Category already exist');
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

   function EditSubCategory($id){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

                $MainCategory = DB::table('categorey')->where('id','=',$id)->first();
               $categories = DB::table('supcategorey')->where('catg_id','=',$id)->get();
               //dd($categories);
               return view('/admin/Category/editsubajax')->with(['categories'=>$categories,'MainCategory'=>$MainCategory]);

           }
           else {

               return view('NotAuth');

           }



       }
       else{

           return redirect('/login');
       }


   }

   function EditSubCategorySave(Request $request,$id){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

       $name      = $request->get('name');
       $order_num      = $request->get('order_num');

       //dd($request,$id,$name,$order_num);

       DB::table('supcategorey')->where('id','=',$id)->update(['name'=>$name,'order_num'=>$order_num]);

               $activity= 'has been Edit in SubCategory : ' . $name . ' with ID: '.$id.' .';

               DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


               Session::flash('message', 'SubCategory edited successfully');
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

   function AddSubCategory(Request $request,$id){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

       $name      = $request->get('name');
       $order_num      = $request->get('order_num');
       $category = DB::table('supcategorey')->where([['name','=',$name],['catg_id','=',$id]])->first();

       if (empty($category)){

           DB::table('supcategorey')->insert(['name'=>$name,'order_num'=>$order_num,'catg_id'=>$id]);

           $category = DB::table('supcategorey')->where([['name','=',$name],['catg_id','=',$id]])->first();

           $activity= 'has been Add SubCategory : ' . $name . ' with ID: '.$category->id.' .';

           DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

           Session::flash('message', 'SubCategory Added successfully');
           return Redirect::back();


       }else{
           Session::flash('message', 'SubCategory already exist');
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

   function DeleteCategory($id){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

        $SubCategories = DB::table('supcategorey')->where('catg_id','=',$id)->first();
        if (empty($SubCategories)){

            $category = DB::table('categorey')->where('id','=',$id)->first();


            $activity= 'has been Delete Category : ' . $category->name . ' with ID: '.$id.' .';


            DB::table('categorey')->where('id','=',$id)->delete();


            DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


            Session::flash('message', 'Category Deleteded successfully');
            return Redirect::back();

        }else{

            Session::flash('message', 'This Category have SubCategories please delete them first');
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

   function DeleteSubCategory($id){

       if (Auth::check()) {

           $user = Auth::user();

           if($user->role_id != 3){

               $SubCategories = DB::table('supcategorey')->where('id','=',$id)->first();

               $activity= 'has been Delete SubCategory : ' . $SubCategories->name . ' with ID: '.$id.' .';


               DB::table('supcategorey')->where('id','=',$id)->delete();

               DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


               Session::flash('message', 'SubCategory Deleteded successfully');
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

    //
}
