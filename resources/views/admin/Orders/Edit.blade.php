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
                    <h4 class="page-title">Edit Orders</h4>
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
                    <h5 class="card-title">Orders</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Total Cost</th>
                                <th>Order Status</th>
                                <th>Full Address</th>
                                <th>Delivered on</th>
                                <th>Phone</th>
                                <th>Additional Phone</th>
                                <th>Notes</th>
                                <th>Payment Method</th>
                                <th></th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($orders as $order)
                                <tr>
                                    <form id="example-form" action="{{route('admin.Orders.Edit', ['id' => $order->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <td><a href="/admin/Orders/View/{{$order->id}}" id="edit_popup" class="btn btn-template-outlined btn-sm edit_popup"><span>#{{$order->id}}</span></a></td>
                                    <td>{{$order->customerName}}</td>
                                    <td>{{$order->total_cost}}</td>
                                    <td><select id="status" name="status" class="required form-control">
                                            <option value="under revision" {{($order->status == 'under revision') ? 'selected="true"':'' }} >under revision</option>
                                            <option value="Shipping" {{($order->status == 'Shipping') ? 'selected="true"':'' }} >Shipping</option>
                                            <option value="Delivered" {{($order->status == 'Delivered') ? 'selected="true"':'' }} >Delivered</option>
                                            <option value="Canceled" {{($order->status == 'Canceled') ? 'selected="true"':'' }} >Canceled</option>
                                        </select></td>
                                    <td>{{$order->country}} , {{$order->state}} , {{$order->city}} , {{$order->address}}</td>
                                    <td>{{$order->delivered_time}}</td>
                                    <td>{{$order->phone1}}</td>
                                    <td>{{$order->phone2}}</td>
                                    <td>{{$order->notes}}</td>
                                    <td>{{$order->payment_method}}</td>
                                        <td><input type="submit" id="save" name="Save" value="Save"  class="button button-rounded button-reveal button-small">
                                        </td>
                                    </form>
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