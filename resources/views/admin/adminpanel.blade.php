@extends('admin.layouts.app')
@section('add_styles')
    <link href="{{asset('admin/assets/libs/flot/css/float-chart.css')}}" rel="stylesheet">

    <script>
        window.onload = function () {

            var chart = new CanvasJS.Chart("chartContainer", {
                title: {
                    text: "Order"
                },
                axisY: {
                    title: "Price"
                },
                data: [{
                    type: "line",
                    dataPoints: <?php echo json_encode($ordersPrice, JSON_NUMERIC_CHECK); ?>
                }]
            });

            chart.render();

            var chart = new CanvasJS.Chart("chartContainer2", {
                animationEnabled: true,
                theme: "light2",
                title:{
                    text: "Category"
                },
                axisY: {
                    title: "Amount"
                },
                data: [{
                    type: "column",
                    yValueFormatString: "#,##0.## Item",
                    dataPoints: <?php echo json_encode($categoriesStat, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();

        }
    </script>
@endsection


@section('admin-content')

    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
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
            <!-- Sales Cards  -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div>
                                    <h4 class="card-title">Site Analysis</h4>
                                    <h5 class="card-subtitle">Overview of Latest Month</h5>
                                </div>
                            </div>
                            <div class="row">
                                <!-- column -->
                                <div class="col-lg-9">
                                    <div class="flot-chart">
                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-user m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$totalUsers}}</h5>
                                                <small class="font-light">Total Users</small>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-plus m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$newUsers}}</h5>
                                                <small class="font-light">New Users</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-cart-plus m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$deliveredOrders}}</h5>
                                                <small class="font-light">Total Delivered</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-tag m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$Orders}}</h5>
                                                <small class="font-light">Total Orders</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-table m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$PendingOrders}}</h5>
                                                <small class="font-light">Under Revision Orders</small>
                                            </div>
                                        </div>
                                        <div class="col-6 m-t-15">
                                            <div class="bg-dark p-10 text-white text-center">
                                                <i class="fa fa-globe m-b-5 font-16"></i>
                                                <h5 class="m-b-0 m-t-5">{{$OnlineOrders}}</h5>
                                                <small class="font-light">Shipping Orders</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Real Time Chart</h5>
                            <div id="chartContainer2" style="height: 300px; width: 100%;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->

        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
    </div>


@endsection

@section('add_script')

    <script src="{{asset('admin/assets/libs/flot/excanvas.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.time.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.stack.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot/jquery.flot.crosshair.js')}}"></script>
    <script src="{{asset('admin/assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('admin/dist/js/pages/chart/chart-page-init.js')}}"></script>
    <script src="{{asset('admin/dist/js/jquery.canvasjs.min.js')}}"></script>

@endsection
