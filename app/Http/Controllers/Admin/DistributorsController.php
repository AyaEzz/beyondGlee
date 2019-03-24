<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;


class DistributorsController extends Controller
{
    function getIndex(){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){



                $Distributors = DB::table('distributors')->get();
                //dd($products);
                return view('/admin/Distributors/Distributors')->with(['Distributors'=>$Distributors]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }




    }
    function EditDistributorAjax($id){


        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){



                $Distributor = DB::table('distributors')->where('id','=',$id)->first();
                //dd($products);
                return view('/admin/Distributors/Edit')->with(['Distributor'=>$Distributor]);

            }
            else {

                return view('NotAuth');

            }



        }
        else{

            return redirect('/login');
        }



    }

    function EditDistributorAjaxSave(Request $request,$id){
        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


        $Distributor = DB::table('distributors')->where('id','=',$id)->first();

        if( $request->get('name') != '' ){
            $name = $request->get('name');
        }else{

            $name = $Distributor->name;
        }

        if( $request->get('phone') != '' ){
            $phone = $request->get('phone');
        }else{

            $phone = $Distributor->phone;
        }

        if( $request->get('description') != '' ){
            $description = $request->get('description');
        }else{

            $description = $Distributor->description;
        }

        if( $request->get('address') != '' ){
            $address = $request->get('address');
        }else{

            $address = $Distributor->address;
        }


        $mimage      = $request->file('mimage');

        $destPath = 'Distributors/' .$name.'/';

        if(!empty($mimage)){
            $mimagename = $mimage->getClientOriginalName();
            $mimage->move($destPath , $mimagename);

            $mainImage=$destPath.$mimagename;

        }else{

            $mainImage = $Distributor->image;
        }



        DB::table('distributors')->where('id','=',$id)->update(['name'=>$name,'phone'=>$phone,'description'=>$description,'address'=>$address,'image'=>$mainImage]);

                $activity= 'has been Edit in Distributor with Name: ' . $name . ' with ID: '.$id.' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Distributor Updated successfully');
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

    function Add(Request $request){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){



                if( $request->get('name') != '' ){
            $name = $request->get('name');
        }

        if( $request->get('phone') != '' ){
            $phone = $request->get('phone');
        }

        if( $request->get('description') != '' ){
            $description = $request->get('description');
        }

        if( $request->get('address') != '' ){
            $address = $request->get('address');
        }


        $mimage      = $request->file('mimage');

        $destPath = 'Distributors/' .$name.'/';

        if(!empty($mimage)){
            $mimagename = $mimage->getClientOriginalName();
            $mimage->move($destPath , $mimagename);

            $mainImage=$destPath.$mimagename;

        }



      DB::table('distributors')->insert(['name'=>$name,'phone'=>$phone,'description'=>$description,'address'=>$address,'image'=>$mainImage]);

                $Distributor = DB::table('distributors')->where('name','=',$name)->first();
                $activity= 'has been Add Distributor with Name: ' . $name . ' with ID: '.$Distributor->id.' .';

                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);


                Session::flash('message', 'Distributor Added successfully');
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

    function DeleteDistributor($id){

        if (Auth::check()) {

            $user = Auth::user();

            if($user->role_id != 3){


                $Distributor = DB::table('distributors')->where('id','=',$id)->first();


                $activity= 'has been Edit in Distributor with Name: ' . $Distributor->name . ' with ID: '.$id.' .';


                DB::table('distributors')->where('id','=',$id)->delete();


                DB::table('admin_activity')->insert(['user_id'=>$user->id,'activity'=>$activity]);

                Session::flash('message', 'Distributor Deleteded successfully');
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
