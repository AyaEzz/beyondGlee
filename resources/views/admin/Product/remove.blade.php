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
                    <h4 class="page-title">Delete Products</h4>
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
                    <h5 class="card-title">Products</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Remove Product</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Sale</th>
                                <th>Discount</th>
                                <th>Likes</th>
                                <th>Price</th>
                                <th>Total Amount</th>
                                <th>Add Information</th>
                                <th>Average Review</th>
                                <th>Views</th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td><div class="row">
                                        <a href="/admin/Product/Delete/{{$product->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="fa fa-trash"></i><span>Delete Product</span></a>
                                            <a href="/admin/Product/Reviews/{{$product->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="mdi mdi-message"></i><span>Reviews</span></a></div>
                                    </td>

                                    <td><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->description}}</td>
                                    <td>{{$product->CategoryName}} => {{$product->SubCategoryName}}</td>
                                    <td><input id="sale" name="sale" class="button button-rounded" type="checkbox"  {{$product->sale ? 'checked="true"' :''}} disabled>
                                    </td>
                                    <td>{{$product->discount}}</td>
                                    <td>{{$product->likes}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->total_amount}}</td>
                                    <td>{{$product->add_info}}</td>
                                    <td>{{$product->avgreview}}</td>
                                    <td>{{$product->views}}</td>
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