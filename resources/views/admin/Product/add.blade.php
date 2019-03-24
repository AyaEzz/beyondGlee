@extends('admin.layouts.app')

@section('add_styles')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />
    <style>


</style>
@endsection

@section('admin-content')


    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Add Product</h4>
                    <div class="ml-auto text-right">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Product</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add</li>
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
            <div class="card">
                <div class="card-body wizard-content">
                    <h4 class="card-title">Add Product</h4>
                    @if (Session::has('message'))
                        <div class="alert alert-info">{{ Session::get('message') }}</div>
                    @endif
                    <h6 class="card-subtitle"></h6>
                    <form id="example-form" action="{{route('admin.Product.Add')}}" method="post" class="m-t-40" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div>
                            <h3>General Info</h3>
                            <section>
                                <label for="name">Product name *</label>
                                <input id="name" name="name" type="text" class="required form-control">
                                <label for="description">Description *</label>
                                <input id="description" name="description" type="text" class="required form-control">
                                <label for="category">Category *</label>
                                <select id="category" name="category" class="required form-control">
                                    <option selected="true" disabled="disabled">Choose Category</option>
                                    @foreach($categories as $categorey)
                                    <optgroup label="{{$categorey->name}}">
                                        @foreach($subcategories as $subcategory)
                                            @if($subcategory->catg_id == $categorey->id)
                                                <option value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                                            @endif

                                        @endforeach
                                    </optgroup>
                                    @endforeach
                                </select>
                                <div class="row">
                                <label for="sale">Sale *</label>
                                <input onchange="showHideControl();" type="checkbox" placeholder="Sale" id="sale" name="sale" >
                                </div>
                                <div class="row">
                                    <label for="discount" class="discount" style=" display:none" id="discount" >Discount %*</label>
                                <input type="text" class="discount" style=" display:none" placeholder="Discount" id="discount" name="discount">
                                </div>
                                <div class="row">
                                    <label for="featured">Feature Product *</label>
                                    <input type="checkbox" placeholder="Feature Product" id="featured" name="featured" >
                                </div>
                                <label for="price">Price *</label>
                                <input id="price" name="price" type="text" class="required form-control">
                                <div class="clear"></div>
                                <label for="addinfo">Add Information</label>
                                <div id="addinfo" class="addinfo"  >
                                    <div style="border:2px solid cadetblue;padding: 18px;">
                                    <div class="col-md-6">
                                    <label for="feature1">Feature 1</label>
                                    <input id="feature1" name="feature1" type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                    <label for="value1">Value 1</label>
                                    <input id="value1" name="value1" type="text" class="form-control">
                                    </div>
                                    </div>
                                </div>
                                <label for="addmore1">Are you want to add more item?</label>
                                <input id="addmore1" name="addmore1" class="button button-rounded" type="button" onclick="add_fields2()" value="Add">

                                <label for="mimage">Main Image</label>
                                <input id="mimage" name="mimage" type="file" accept="image/*" class="form-control">
                                <label for="aimage">Add Images</label>
                                <input id="aimage" name="aimage[]" type="file" accept="image/*" class="form-control" multiple>


                                <p>(*) Mandatory</p>
                            </section>
                            <h3>Product Details</h3>
                            <section id="productdetails" class="productdetails">
                                <div class="PDitems" id="PDitems">
                                <div class="form-group detailsinput" style="border:2px solid cadetblue;padding: 18px;" id="detailsinput">
                                    <label>Item 1<br></label>
                                    <div class="clear"></div>
                                    <label for="snum1">Serial Number *</label>
                                    <input id="snum1" name="snum1" type="text" class="required form-control">
                                    <label for="amount1">Amount *</label>
                                    <input id="amount1" name="amount1" type="number" class="required form-control">
                                    <div class="col-md-2">
                                    <label for="color1">Color *</label>
                                    <input id="color1" name="color1" type="color" class="required form-control">
                                    </div>
                                    <label for="size1">Size *</label>
                                    <input id="size1" name="size1" type="text" class="required form-control">
                                    <label for="osize1">Size Order *</label>
                                    <input id="osize1" name="osize1" type="text" class="required form-control">
                                    <div class="line"></div>
                                </div>
                                </div>
                                <label for="addmore">Are you want to add more item?</label>
                                <input id="addmore" name="addmore" class="button button-rounded" type="button" onclick="add_fields()" value="Add">

                                <p>(*) Mandatory</p>
                            </section>
                            <h3>Tags And Finish</h3>
                            <section>

                                <div id="tags" class="tags" style="border:2px solid cadetblue;padding: 18px;" >
                                    <div >

                                            <label for="tag1">Tag 1</label>
                                            <input id="tag1" name="tag1" type="text" class="form-control">

                                    </div>
                                </div>
                                <label for="addmore">Are you want to add more item?</label>
                                <input id="addmore" name="addmore" class="button button-rounded" type="button" onclick="add_fields3()" value="Add">

                                <div class="line"></div>
                                <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required">
                                <label for="acceptTerms">Are you confirm to Add the product which you entered?</label>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End PAge Content -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Right sidebar -->
            <!-- ============================================================== -->
            <!-- .right-sidebar -->
            <!-- ============================================================== -->
            <!-- End Right sidebar -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->



@endsection

@section('add_script')

    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>
        // Basic Example with form
        var form = $("#example-form");
        form.validate({
            errorPlacement: function errorPlacement(error, element) { element.before(error); },
            rules: {
                confirm: {
                    equalTo: "#password"
                }
            }
        });
        form.children("div").steps({
            headerTag: "h3",
            bodyTag: "section",
            transitionEffect: "slideLeft",
            onStepChanging: function(event, currentIndex, newIndex) {
                form.validate().settings.ignore = ":disabled,:hidden";
                return form.valid();
            },
            onFinishing: function(event, currentIndex) {
                form.validate().settings.ignore = ":disabled";
                form.submit();
                return form.valid();

            },

        });


        function showHideControl()
        {
            $('.discount').toggle();
        }

        var room = 1;
        function add_fields() {
            room++;
            var objTo = document.getElementById('PDitems')
            var divtest = document.createElement("div");
            divtest.style="border:2px solid cadetblue;padding: 18px;"
            divtest.innerHTML = '<label>Item '+room+'<br></label> ' +
                '<div class="clear"></div>' +
                '<label for="snum'+room+'">Serial Number *</label>' +
                '<input id="snum'+room+'" name="snum'+room+'" type="text" class="required form-control">' +
                '<label for="amount'+room+'">Amount *</label> ' +
                '<input id="amount'+room+'" name="amount'+room+'" type="number" class="required form-control"> ' +
                '<div class="col-md-2"> ' +
                '<label for="color'+room+'">Color *</label> ' +
                '<input id="color'+room+'" name="color'+room+'" type="color" class="required form-control"> ' +
                '</div> ' +
                '<label for="size'+room+'">Size *</label> ' +
                '<input id="size'+room+'" name="size'+room+'" type="text" class="required form-control"> ' +
                '<label for="osize'+room+'">Size Order *</label> ' +
                '<input id="osize'+room+'" name="osize'+room+'" type="text" class="required form-control"> ' +
                '<div class="line"></div>';

            objTo.appendChild(divtest)
        }

        var room2 = 1;
        function add_fields2() {
            room2++;
            var objTo = document.getElementById('addinfo')
            var divtest = document.createElement("div");
            divtest.style="border:2px solid cadetblue;padding: 18px;"

            divtest.innerHTML ='<div class="col-md-6">' +
            '<label for="feature'+room2+'">Feature '+room2+'</label> ' +
            '<input id="feature'+room2+'" name="feature'+room2+'" type="text" class="form-control"> ' +
            '</div> ' +
            '<div class="col-md-6"> ' +
            '<label for="value'+room2+'">Value '+room2+'</label> ' +
            '<input id="value'+room2+'" name="value'+room2+'" type="text" class="form-control"> ' +
            '</div>';

            objTo.appendChild(divtest)
        }

        var room3 = 1;
        function add_fields3() {
            room3++;
            var objTo = document.getElementById('tags')
            var divtest = document.createElement("div");

            divtest.innerHTML ='<label for="tag'+room3+'">Tag '+room3+'</label>' +
                '<input id="tag'+room3+'" name="tag'+room3+'" type="text" class="form-control">';

            objTo.appendChild(divtest)
        }

    </script>

@endsection