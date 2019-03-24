@extends('admin.layouts.app')

@section('add_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('admin/dist/css/magnific-popup.css')}}">

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
                    <h4 class="page-title">Shipping Prices</h4>
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
            <div class="row">
                <div class="col-md-12">

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="card">
                <div class="card-body">
                    <h5 class="card-title">States</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered" style="table-layout: fixed;width: available">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Shipping</th>
                                <th ></th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($States as $State)
                                <tr>
                                    <form id="example-form" action="{{route('admin.Shipping.Edit', ['id' => $State->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td><span>#{{$State->id}}</span></td>
                                        <td><input type="text" name="country" id="country" placeholder="{{$State->country}}" value="{{$State->country}}" class="required form-control"></td>
                                        <td><input type="text" name="state" id="state" placeholder="{{$State->state}}" value="{{$State->state}}" class="required form-control"></td>
                                        <td><input type="text" name="price" id="price" placeholder="{{$State->price}}" value="{{$State->price}}" class="required form-control"></td>
                                        <td><div class="row">
                                            <input type="submit" id="save" name="Save" value="Save"  class="button button-rounded button-reveal button-small">
                                            <a href="/admin/Shipping/Delete/{{$State->id}}" id="edit_sub" class="button button-rounded button-reveal button-small button-teal edit_sub"><i class="fa fa-trash"></i><span>Delete</span></a></div>

                    </td>
                                    </form>
                                </tr>
                                @endforeach

                                <tr>
                                    <form id="example-form" action="{{route('admin.Shipping.Add')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td><span>#</span></td>
                                        <td><input type="text" name="country" id="country" placeholder="Enter Country"  class="required form-control"></td>
                                        <td><input type="text" name="state" id="state" placeholder="Enter State"  class="required form-control"></td>
                                        <td><input type="text" name="price" id="price" placeholder="Enter Price"  class="required form-control"></td>
                                        <td><input type="submit" id="Add" name="Add" value="Add"  class="button button-rounded button-reveal button-small">
                                        </td>
                                    </form>
                                </tr>


                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form class="form-horizontal" action="{{route('admin.Distributors.Add')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <h4 class="card-title">Add Distributor</h4>
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Name Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Description Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="mimage" class="col-sm-3 text-right control-label col-form-label">Main Image</label>
                                    <div class="col-sm-9">
                                        <input id="mimage" name="mimage" type="file" accept="image/*" class="form-control">
                                    </div>
                                </div>

                            </div>
                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <!-- editor -->

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

    <script src="{{asset('admin/assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/mask/mask.init.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.full.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/select2/dist/js/select2.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-asColor/dist/jquery-asColor.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-asGradient/dist/jquery-asGradient.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

    <script src="{{asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js')}}"></script>
    <script src="{{asset('admin/assets/extra-libs/DataTables/datatables.min.js')}}"></script>

    <script src="{{asset('admin/dist/js/jquery.magnific-popup.js')}}"></script>
    <script>

        $(document).ready(function() {
            $('.edit_popup').magnificPopup({type:'ajax'});
        });
        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//
        $(".select2").select2();

        /*colorpicker*/
        $('.demo').each(function() {
            //
            // Dear reader, it's actually very easy to initialize MiniColors. For example:
            //
            //  $(selector).minicolors();
            //
            // The way I've done it below is just for the demo, so don't get confused
            // by it. Also, data- attributes aren't supported at this time...they're
            // only used for this demo.
            //
            $(this).minicolors({
                control: $(this).attr('data-control') || 'hue',
                position: $(this).attr('data-position') || 'bottom left',

                change: function(value, opacity) {
                    if (!value) return;
                    if (opacity) value += ', ' + opacity;
                    if (typeof console === 'object') {
                        console.log(value);
                    }
                },
                theme: 'bootstrap'
            });

        });
        /*datwpicker*/
        jQuery('.mydatepicker').datepicker();
        jQuery('#datepicker-autoclose').datepicker({
            autoclose: true,
            todayHighlight: true
        });


    </script>

@endsection