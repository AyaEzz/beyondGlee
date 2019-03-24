<div class="shop-quick-view-ajax clearfix">

    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/jquery.steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-steps/steps.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/select2/dist/css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/jquery-minicolors/jquery.minicolors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />

    <script>
        var room2 = parseInt("<?php echo $count; ?>");
        var room3 = parseInt("<?php echo sizeof($tags); ?>");;
    </script>

    <div class="ajax-modal-title">
        <h2>{{$product->name}}</h2>
    </div>

    <div class="modal-padding clearfix">
        <div class="header">
            <h4 class="title">Edit {{$product->name}}</h4>
        </div>
        <div class="content">

            <form action="{{route('admin.Product.Edit', ['id' => $product->id])}}" method="post" class="m-t-40" enctype="multipart/form-data">

                {{ csrf_field() }}
    <label for="name">Product name *</label>
    <input type="text" class="required form-control" id="name" name="name" placeholder="{{$product->name}}" value="{{$product->name}}">
    <label for="description">Description *</label>
    <input id="description" name="description" type="text" class="required form-control" placeholder="{{$product->name}}" value="{{$product->name}}">
    <label for="category">Category *</label>
    <select id="category" name="category" class="required form-control">
        <option selected="true" disabled="disabled">Choose Category</option>
        @foreach($categories as $categorey)
            <optgroup label="{{$categorey->name}}">
                @foreach($subcategories as $subcategory)
                    @if($subcategory->catg_id == $categorey->id)
                        <option {{($subcategory->id == $product->supCateg_id)?'selected="selected"':''}} value="{{$subcategory->id}}">{{$subcategory->name}}</option>
                    @endif

                @endforeach
            </optgroup>
        @endforeach
    </select>
    <div class="row">
        <label for="sale">Sale *</label>
        <input onchange="showHideControl();" type="checkbox" {{$product->sale ? 'checked="true"' :''}} placeholder="Sale" id="sale" name="sale" >
    </div>
    <div class="row">
        <label for="discount" class="discount"  {{$product->sale ? '':'style=display:none'}} id="discount" >Discount %*</label>
        <input type="text" class="discount" {{$product->sale ? '':'style=display:none'}} placeholder="{{$product->discount}}" value="{{$product->discount}}" id="discount" name="discount">
    </div>
    <div class="row">
        <label for="featured">Feature Product *</label>
        <input type="checkbox" placeholder="Feature Product" id="featured" name="featured" >
    </div>
    <label for="price">Price *</label>
    <input id="price" name="price" type="text" placeholder="{{$product->price}}" value="{{$product->price}}" class="required form-control">
    <div class="clear"></div>
    <label for="addinfo">Add Information</label>
    <div id="addinfo" class="addinfo"  >

        @for ($i = 0 ; $i < sizeof($add_info) ; $i++)

            @php
            $ins = (explode(":", $add_info[$i]))
        @endphp
        <div style="border:2px solid cadetblue;padding: 18px;">
            <div class="col-md-6">
                <label for="feature{{$i+1}}">Feature {{$i+1}}</label>
                <input id="feature{{$i+1}}" name="feature{{$i+1}}" placeholder="{{$ins[0]}}" value="{{$ins[0]}}" type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="value{{$i+1}}">Value {{$i+1}}</label>
                <input id="value{{$i+1}}" name="value{{$i+1}}" placeholder="{{$ins[1]}}" value="{{$ins[1]}}" type="text" class="form-control">
            </div>
        </div>
            @endfor
    </div>
                <div class="row">
    <label for="addmore1">Are you want to add more item?</label>
                </div>
                <div class="row">
    <input id="addmore1" name="addmore1" class="button button-rounded" type="button" onclick="add_fields2()" value="Add">
                </div>
                <div class="row">
    <label for="mimage">Main Image </label>
                </div>
                <div class="row">
    <input id="mimage" name="mimage" type="file" accept="image/*" class="form-control">
                    <img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}">
                </div>
    <label for="aimage">Add Images</label>

    <input id="aimage" name="aimage[]" type="file" accept="image/*" class="form-control" multiple>

                @php
                    $images = explode("*", $product->add_images);
                @endphp
                <div class="row">
                    @foreach($images as $image )
                        <img width="64" height="64" src="{{asset($image)}}" alt="{{$product->name}}">
                    @endforeach
                </div>

                <div class="line"></div>
                <label for="tags">Tags</label>

                <div id="tags" class="tags" style="border:2px solid cadetblue;padding: 18px;" >
                    @for ($i = 1 ; $i <= sizeof($tags) ; $i++)
                    <div >

                        <label for="tag{{$i}}">Tag {{$i}}</label>
                        <input id="tag{{$i}}" name="tag{{$i}}" type="text" placeholder="{{$tags[$i-1]->name}}" value="{{$tags[$i-1]->name}}" class="form-control">

                    </div>
                        @endfor
                </div>
                <label for="addmore">Are you want to add more item?</label>
                <input id="addmore" name="addmore" class="button button-rounded" type="button" onclick="add_fields3()" value="Add">



                <p>(*) Mandatory</p>


                    <div class="col-full">
                        <button type="submit" class="button button-large">Save</button>
                    </div>


            </form>
        </div>
    </div>


    <script src="{{asset('admin/assets/libs/jquery-steps/build/jquery.steps.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script>
        // Basic Example with form
           function showHideControl()
        {
            $('.discount').toggle();
        }



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


        function add_fields3() {
            room3++;
            var objTo = document.getElementById('tags')
            var divtest = document.createElement("div");

            divtest.innerHTML ='<label for="tag'+room3+'">Tag '+room3+'</label>' +
                '<input id="tag'+room3+'" name="tag'+room3+'" type="text" class="form-control">';

            objTo.appendChild(divtest)
        }

    </script>
</div>