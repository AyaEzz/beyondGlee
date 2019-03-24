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
                    <h4 class="page-title">Main Categories</h4>
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
                    <h5 class="card-title">Categories</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif

                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Category</th>
                                <th>Order</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>

                                @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->order_num}}</td>
                                    <td><div class="row"> <a href="/admin/Categories/Edit/{{$category->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="fa fa-edit"></i><span>Edit</span></a>
                                        <a href="/admin/Categories/Edit/Sub/{{$category->id}}" id="edit_popup22" class="button button-rounded button-reveal button-small button-teal edit_popup22"><i class="fas fa-sitemap"></i><span>Sub Categories</span></a>
                                        <a href="/admin/Categories/Delete/{{$category->id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="mdi mdi-minus-circle"></i><span>Delete</span></a></div></td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <form id="example-form" action="{{route('admin.Categories.Add')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td><input id="name" name="name" type="text" class="required form-control"></td>
                                        <td><input type="number" name="order_num" id="order_num" class="plus scolor"></td>
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