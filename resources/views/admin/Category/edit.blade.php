<div class="shop-quick-view-ajax clearfix">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />



    <div class="ajax-modal-title">
        <h2>{{$category->name}}</h2>
    </div>

    <div class="modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit {{$category->name}}</h4>
        </div>
        <div class="content">

            <form action="{{route('admin.Categories.Edit', ['id' => $category->id])}}" method="post">

                {{ csrf_field() }}
    <label for="name">Category name *</label>
    <input type="text" class="required form-control" id="name" name="name" placeholder="{{$category->name}}" value="{{$category->name}}">
    <label for="order_num">Order Number *</label>
    <input id="order_num" name="order_num" type="text" class="required form-control" placeholder="{{$category->order_num}}" value="{{$category->order_num}}">


                <p>(*) Mandatory</p>


                    <div class="col-full">
                        <button type="submit" class="button button-large">Save</button>
                    </div>


            </form>
        </div>
    </div>


    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    </div>