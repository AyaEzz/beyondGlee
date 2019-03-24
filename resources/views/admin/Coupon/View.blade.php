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
                    <h4 class="page-title">View Coupons</h4>
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
                    <h5 class="card-title">Coupons</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Code</th>
                                <th>Active</th>
                                <th>Discount %</th>
                                <th>Total Consumption</th>
                                <th>Filter By Category</th>
                                <th>Filter By User</th>
                                <th>Max Number of Using</th>
                                <th>Number of Used</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created At</th>
                                <th>Updated At</th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($coupons as $coupon)
                                <tr>
                                    <td><a href="/admin/Coupons/View/{{$coupon->id}}" id="edit_popup" class="btn btn-template-outlined btn-sm edit_popup"><span>#{{$coupon->id}}</span></a></td>
                                    <td>{{$coupon->code}}</td>
                                    <td>{{($coupon->active)?'Active':'Not Active'}}</td>
                                    <td>{{$coupon->amount}}</td>
                                    <td>{{(array_key_exists($coupon->code,$sumCoupon)) ? $sumCoupon[$coupon->code] : 'Not Used'}}</td>
                                    <td>@if($coupon->fisubcategory) <a href="/admin/Coupons/View/CatFilter/{{$coupon->id}}" id="edit_popup" class="btn btn-template-outlined btn-sm edit_popup"><strong>Show Filter</strong></a> @else Applied on all @endif</td>
                                    <td>@if($coupon->fiusers) <a href="/admin/Coupons/View/UserFilter/{{$coupon->id}}" id="edit_popup" class="btn btn-template-outlined btn-sm edit_popup"><strong>Show Filter</strong></a> @else Applied on all @endif</td>
                                    <td>{{$coupon->max_use_times}}</td>
                                    <td>{{$coupon->used_times}}</td>
                                    <td>{{$coupon->start_time}}</td>
                                    <td>{{$coupon->end_time}}</td>
                                    <td>{{$coupon->created_at}}</td>
                                    <td>{{$coupon->updated_at}}</td>
                                    </tr>
                                @endforeach


                            </tbody>

                        </table>
                    </div>

                </div>
            </div>
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
            $('.edit_popup').magnificPopup({type:'ajax'});
        });

        /****************************************
         *       Basic Table                   *
         ****************************************/
        $('#zero_config').DataTable();
        //***********************************//
        // For select 2
        //***********************************//

    </script>



@endsection