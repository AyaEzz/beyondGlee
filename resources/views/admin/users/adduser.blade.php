@extends('admin.layouts.app')

@section('add_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
    <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
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
                    <h4 class="page-title">Add User</h4>
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
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">All Users</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Active</th>
                                <th>Title</th>
                                <th>E-Mail</th>
                                <th>Birthday</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>State</th>
                                <th>Address</th>
                            </tr>
                            </thead>
                            <tbody>

                                @foreach($users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->active ? 'Yes':'No'}}</td>
                                    <td>{{$user->title}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->birthday}}</td>
                                    <td>{{$user->phone}}</td>
                                    <td>{{$user->country}}</td>
                                    <td>{{$user->state}}</td>
                                    <td>{{$user->address}}</td>
                                </tr>
                                @endforeach


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
                        <form class="form-horizontal" action="{{route('admin.AddUser')}}" method="post">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <h4 class="card-title">Personal Info</h4>
                                <div class="form-group row">
                                    <label for="uname" class="col-sm-3 text-right control-label col-form-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="uname" name="uname" placeholder="User Name Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="Title Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fname" class="col-sm-3 text-right control-label col-form-label">First Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Last Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lname" class="col-sm-3 text-right control-label col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Password Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email1" class="col-sm-3 text-right control-label col-form-label">E-Mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="phone" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone No Here" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="birthday" class="col-sm-3 text-right control-label col-form-label">BirthDay</label>
                                    <div class="col-sm-9">
                                        <input type="date" name="birthday" class="form-control border-input" placeholder="BirthDay Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="country" class="col-sm-3 text-right control-label col-form-label">Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="country" name="country" placeholder="Country Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="state" class="col-sm-3 text-right control-label col-form-label">State</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="state" name="state" placeholder="State Here">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="address" class="col-sm-3 text-right control-label col-form-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="address" name="address" placeholder="Address Here">
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

    <script>
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