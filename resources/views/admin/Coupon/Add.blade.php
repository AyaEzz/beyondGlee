@extends('admin.layouts.app')

@section('add_styles')
    <link rel="stylesheet" href="{{asset('admin/dist/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
@endsection

@section('admin-content')


    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Add Coupon</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Library</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Start Page Content -->
            <!-- ============================================================== -->


            @if (Session::has('message'))
                <div class="alert alert-info">{{ Session::get('message') }}</div>
            @endif



            <div class="row">
                <div class="col-md-12">

                    <form id="example-form" action="{{route('admin.Coupons.Add')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Generate Coupon</h5>
                                <div class="form-group row">

                                        <input type="text" name="Coupon" id="Coupon" class="col-sm-3 text-right sm-form-control" placeholder="Enter Coupon Code.." />

                                    <div class="col-sm-9">
                                        <input type="button" id="getrandom" value="Get Random" class="button button-3d button-black nomargin" onclick="makerandom()">
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="amount" class="col-sm-3 text-right control-label col-form-label">Discount Rate %</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="amount" name="amount" placeholder="Enter Discount Rate % here" required>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="maxuse" class="col-sm-3 text-right control-label col-form-label">Max Used Numbers</label>

                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="maxuse" name="maxuse" placeholder="Enter Max Used Number" required>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="starttime" class="col-sm-3 text-right control-label col-form-label">Start Time</label>

                                    <div class="col-sm-9">
                                        <input type="datetime"  value="<?php echo date("Y-m-d H:i:s",time()); ?>" class="form-control" id="starttime" name="starttime" placeholder="Enter The Starting Time here as <?php echo date("Y-m-d H:i:s",time()); ?>" required>
                                    </div>

                                </div>
                                <div class="form-group row">

                                    <label for="endtime" class="col-sm-3 text-right control-label col-form-label">End Time</label>

                                    <div class="col-sm-9">
                                        <input type="datetime"  value="<?php echo date("Y-m-d H:i:s",time()); ?>" class="form-control" id="endtime" name="endtime" placeholder="Enter The Ending Time here as <?php echo date("Y-m-d H:i:s",time()); ?>" required>
                                    </div>

                                </div>
                            </div>
                            </div>


                        <div class="card">


                            <div class="card-body">
                                <h5 class="card-title">Choose Users</h5>


                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>

                                            <th></th>
                                            <th>User ID</th>
                                            <th>User Name</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr style="background-color: #818182" >
                                            <td><input type="checkbox" name="userallcheck" id="userallcheck" class="userallcheck"></td>
                                            <td colspan="2">All Users</td>


                                        </tr>

                                            @foreach($users as $user)
                                            <tr>
                                                <td><input type="checkbox" name="usercheck[{{$user->id}}]" id="usercheck" class="usercheck" value="{{$user->id}}"></td>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>

                            </div>
                        </div>

                        <div class="card">


                        <div class="card-body">
                            <h5 class="card-title">Choose Categories</h5>


                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>


                                        <th colspan="3"></th>
                                        <th>Category ID</th>
                                        <th>Category Name</th>

                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr style="background-color: #818182">
                                        <td><input type="checkbox" name="cateallcheck" id="cateallcheck" class="cateallcheck"></td>
                                        <td colspan="4">All Categories</td>


                                    </tr>

                                    @foreach($categories as $categorey)
                                        <tr style="background-color: #0E76A8">

                                            <td colspan="2"><input type="checkbox" name="cateallcheck[{{$categorey->id}}]" id="cateallcheck_{{$categorey->id}}" class="cateallcheck_{{$categorey->id}}"></td>
                                            <td colspan="3">All {{$categorey->name}} Category</td>

                                        </tr>
                                            @foreach($subcategories as $subcategory)
                                                @if($subcategory->catg_id == $categorey->id)
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                    <td><input type="checkbox" name="subcateallcheck[{{$categorey->id}}][{{$subcategory->id}}]" id="subcateallcheck_{{$categorey->id}}" class="subcateallcheck_{{$categorey->id}}" value="{{$subcategory->id}}"></td>
                                                        <td>{{$subcategory->id}}</td>
                                                        <td>{{$subcategory->name}}</td>
                                                    </tr>
                                                    @endif

                                            @endforeach
                                        </optgroup>
                                    @endforeach

                                    </tbody>

                                </table>
                            </div>

                        </div>
                    </div>

                        <div class="card">

                            <div class="card-body">
                                <h5 class="card-title">Save</h5>
                                <div class="form-group row" style="padding-left: 40%">


                                        <input type="submit" value="Save" class="button button-3d button-black nomargin">

                                    <div class="col-sm-3">
                                        <input type="button" value="Reset" id="reset" class="button button-3d button-black nomargin reset">
                                    </div>

                                </div>

                            </div>
                        </div>


                    </form>
                </div>

            </div>

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->

    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->




@endsection

@section('add_script')


    <script src="{{asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    <script src="{{asset('admin/dist/js/jquery.magnific-popup.js')}}"></script>

    <script>

        $(document).ready(function() {

            $('#userallcheck').change(function () {
                //check if checkbox is checked


                if ($(this).is(':checked')) {

                    $('.usercheck').prop("disabled", true);
                    $('.usercheck').prop("checked", true);
                    //alert('checked');


                } else {


                    $('.usercheck').prop("disabled", false);
                    $('.usercheck').prop("checked", false);
                    //disable input
                }
            });

            $('[id^="cateallcheck_"]').change(function () {
                //check if checkbox is checked


                var id = $(this).attr("id").split('_')[1];

                //alert(id);

                if ($(this).is(':checked')) {



                    $('.subcateallcheck_'+ id).prop("disabled", true);
                    $('.subcateallcheck_'+ id).prop("checked", true);
                    //alert('checked');


                } else {


                    $('.subcateallcheck_'+ id).prop("disabled", false);
                    $('.subcateallcheck_'+ id).prop("checked", false);
                    //disable input
                }
            });

            $('#cateallcheck').change(function () {
                //check if checkbox is checked


                if ($(this).is(':checked')) {

                    $('[id^="cateallcheck_"]').prop("disabled", true);
                    $('[id^="cateallcheck_"]').prop("checked", true);
                    $('[id^="subcateallcheck_"]').prop("disabled", true);
                    $('[id^="subcateallcheck_"]').prop("checked", true);
                    //alert('checked');


                } else {


                    $('[id^="cateallcheck_"]').prop("disabled", false);
                    $('[id^="cateallcheck_"]').prop("checked", false);
                    $('[id^="subcateallcheck_"]').prop("disabled", false);
                    $('[id^="subcateallcheck_"]').prop("checked", false);
                    //disable input
                }
            });


            $( ".reset" ).click(function() {
                location.reload(true);
            });

            $('.edit_popup').magnificPopup({type:'ajax'});


        });

        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//

        function makerandom() {
            var text = "";
            var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

            for (var i = 0; i < 15; i++){

                text += possible.charAt(Math.floor(Math.random() * possible.length));
            }
            var couponcode = document.getElementById("Coupon");
            couponcode.value = text;
        }



    </script>



@endsection