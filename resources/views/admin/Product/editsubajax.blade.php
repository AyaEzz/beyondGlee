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
                    <h4 class="page-title">Edit Products</h4>
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
                    <h5 class="card-title">SubProducts</h5>

                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif



                    <div class="table-responsive">
                        <table id="zero_config2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Size Order</th>
                                <th>Serial Number</th>
                                <th>Save</th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <form id="example-form" action="{{route('admin.SubProduct.Edit', ['id' => $product->prodD_id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                    <td><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></td>
                                    <td>{{$product->name}}</td>
                                    <td><input id="amount" name="amount" type="number" placeholder="{{$product->maxAmount}}" value="{{$product->maxAmount}}" class="required form-control"></td>
                                    <td><input type="button" name="colorBu" id="colorBut{{$product->prodD_id}}" style="background-color: {{$product->color}};opacity: .6" class="plus scolor" onclick="changeButton('{{$product->prodD_id}}','{{$product->color}}')"></td>
                                    <td><input id="size" name="size" type="text" placeholder="{{$product->size}}" value="{{$product->size}}" class="required form-control"></td>
                                    <td><input id="osize" name="osize" type="text" placeholder="{{$product->sizeOr}}" value="{{$product->sizeOr}}" class="required form-control"></td>
                                    <td><input id="snum" name="snum" type="text" placeholder="{{$product->serial_no}}" value="{{$product->serial_no}}" class="required form-control"></td>
                                        <td><input type="submit" id="save" name="Save" value="Save"  class="button button-rounded button-reveal button-small"></td>

                                    </form>
                                </tr>

                                @endforeach

                                <tr>
                                    <form id="example-form" action="{{route('admin.SubProduct.Add', ['id' => $product->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <td><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></td>
                                        <td>{{$product->name}}</td>
                                        <td><input id="amount" name="amount" type="number" class="required form-control"></td>
                                        <td><input type="color" name="color" id="color" class="plus scolor"></td>
                                        <td><input id="size" name="size" type="text" class="required form-control"></td>
                                        <td><input id="osize" name="osize" type="text" class="required form-control"></td>
                                        <td><input id="snum" name="snum" type="text" class="required form-control"></td>
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

                function changeButton(id,colorD){


                    var input = document.getElementById('colorBut'+id)
                    input.value=colorD;
                    input.type="color";




                }
                //***********************************//
                // For select 2
                //***********************************//

            </script>



@endsection