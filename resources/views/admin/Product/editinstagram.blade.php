<div class="shop-quick-view-ajax clearfix">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />

    <div class="ajax-modal-title">
        <h2>{{$instagram->id}} => {{$instagram->name}}</h2>
    </div>

    <div class="modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit {{$instagram->id}} => {{$instagram->name}}</h4>
        </div>
        <div class="content">

            <form id="example-form" action="{{route('admin.Product.EditInstagram', ['id' => $instagram->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">
                {{ csrf_field() }}


                <div class="form-group row">
                <label for="product" class="col-sm-3 text-right control-label col-form-label">Product ID -> Name *</label>
                    <div class="col-sm-9">
                    <select id="product" name="product" class="required form-control">
                        <option selected="true" disabled="disabled">Choose Product</option>
                        @foreach($products as $product)
                            <option {{($product->id == $instagram->prod_id)?'selected="selected"':''}} value="{{$product->id}}">ID:{{$product->id}}->Name:{{$product->name}}</option>
                        @endforeach
                    </select>
                    </div>
                </div>

                <div class="form-group row">
                <label for="url" class="col-sm-3 text-right control-label col-form-label">URL *</label>
                    <div class="col-sm-9">
                <input type="text" name="url" id="url" placeholder="{{$instagram->url}}" value="{{$instagram->url}}" class="required form-control">
                </div>
        </div>
                    <input type="submit" id="save" name="Save" value="Save"  class="button button-rounded button-reveal button-small">
            </form>
        </div>
    </div>


    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>

</div>