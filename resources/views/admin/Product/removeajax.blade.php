

    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">

        <link rel="stylesheet" href="{{asset('admin/dist/css/magnific-popup.css')}}">

        <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />

        <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/extra-libs/multicheck/multicheck.css')}}">
        <link href="{{asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css')}}" rel="stylesheet">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Delete SubProduct</h4>
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


                    <div class="table-responsive">
                        <table id="zero_config2" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Remove Product</th>
                                <th>Product</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Amount</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Serial Number</th>

                            </tr>
                            </thead>
                            <tbody>

                                @foreach($products as $product)
                                <tr>
                                    <td><a href="/admin/Product/Delete/Sub/{{$product->prodD_id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="fa fa-trash"></i><span>Delete Product</span></a></td>
                                    <td><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></td>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>{{$product->maxAmount}}</td>
                                    <td><input type="button" name="colorBu" id="colorBut{{$product->color}}" style="background-color: {{$product->color}};opacity: .6" class="plus scolor" disabled></td>
                                    <td>{{$product->size}}</td>
                                    <td>{{$product->serial_no}}</td>
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


                        <div class="card-body">
                            <h5 class="card-title">Tags</h5>


                            <div class="table-responsive">
                                <table id="zero_config2" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>Tag Name</th>
                                        <th>Remove</th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($tags as $tag)
                                        <tr>
                                            <td>{{$tag->name}}</td>
                                            <td><a href="/admin/Product/Delete/Tag/{{$tag->prod_id}}/{{$tag->tag_id}}" id="edit_popup" class="button button-rounded button-reveal button-small button-teal edit_popup"><i class="fa fa-trash"></i><span>Delete Tag</span></a></td>
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
            $('#zero_config2').DataTable();
            //***********************************//
            // For select 2
            //***********************************//

        </script>

    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->






