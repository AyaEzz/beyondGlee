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
                    <h4 class="page-title">Instagram</h4>
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
                    <h5 class="card-title">Instagram URLs</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>URL</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>

                                @foreach($instagrams as $instagram)
                                <tr>
                                    <td><a href="/product/{{$instagram->prod_id}}"><img width="64" height="64" src="{{asset($instagram->image)}}" alt="{{$instagram->name}}"></a>
                                    </td>
                                    <td>{{$instagram->url}}</td>
                                    <td><div class="row"> <a href="/admin/Product/Instagram/Edit/{{$instagram->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="fa fa-edit"></i><span>Edit</span></a>
                                        <a href="/admin/Product/Instagram/Delete/{{$instagram->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="mdi mdi-minus-circle"></i><span>Delete</span></a></div></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <form id="example-form" action="{{route('admin.Product.AddInstagram')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td>
                                            <select id="product" name="product" class="required form-control">
                                                <option selected="true" disabled="disabled">Choose Product</option>
                                                @foreach($products as $product)
                                                    <option value="{{$product->id}}">ID:{{$product->id}}->Name:{{$product->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><input type="text" name="url" id="url" class="required form-control"></td>
                                        <td><input type="submit" id="save" name="Save" value="Add"  class="button button-rounded button-reveal button-small"></td>
                                    </form>
                                </tr>


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