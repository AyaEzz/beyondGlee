<div class="single-product shop-quick-view-ajax clearfix">

    <div class="ajax-modal-title">
        <h2>{{$product->name}}</h2>
    </div>

    <div class="product modal-padding clearfix">

        <div class="col_half nobottommargin">
            <div class="product-image">
                <div class="fslider" data-pagi="false">
                    <div class="flexslider">
                        <div class="slider-wrap">

                            @php
                                $images = explode("*", $product->add_images);
                            @endphp

                            <div class="slide" data-thumb="{{asset($product->image)}}"><a href="{{asset($product->image)}}" title="{{asset($product->name)}}" data-lightbox="gallery-item"><img src="{{asset($product->image)}}" alt="{{asset($product->name)}}"></a></div>
                            @foreach($images as $image )
                                <div class="slide" data-thumb="{{asset($image)}}"><a href="{{asset($image)}}"  data-lightbox="gallery-item"><img src="{{asset($image)}}" alt="{{$product->name}}"></a></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                @if($product->sale)
                    <div class="sale-flash">{{$product->discount}}% Off*</div>
                @endif
            </div>
        </div>
        <div class="col_half nobottommargin col_last product-desc">
            <div class="product-price">
                @if($product->sale)
                    <del id="pprice">£{{$product->price}}</del>
                    <ins>
                        @php
                            $dis = ($product->price*$product->discount)/100;
                            $fprice = $product->price - $dis;
                            echo('<span>£'.$fprice.'</span>');
                        @endphp
                    </ins>
                @endif

                @if(!$product->sale)
                    <ins>
                        @php
                            echo('<span id="pprice">£'.$product->price.'</span>');
                        @endphp
                    </ins>
                @endif
            </div>
            <div class="product-rating">
                @php
                    $review = $product->avgreview;
                    $filled = ceil($review);
                    $empty = 5 - $filled;

                    for($i=1;$i<$filled;$i++)
                    {
                        echo ('<i class="icon-star3"></i>');
                    }

                    if ($review == $filled)
                       echo ('<i class="icon-star3"></i>');
                    else
                       echo ('<i class="icon-star-half-full"></i>');

                    for($i=1;$i<=$empty;$i++)
                    {
                        echo ('<i class="icon-star-empty"></i>');
                    }
                @endphp
            </div>
            <div class="clear"></div>
            <div class="line"></div>

            <!-- Product Single - Quantity & Cart Button
            ============================================= -->

            @php

                $sizestt=json_decode(json_encode($sizest), true);

                $sizes=array_column ($sizestt,'size');

                $sizes=array_unique($sizes);
                $colorstt=json_decode(json_encode($colorst), true);
                $colors=array_column ($colorstt,'color');
                $colors=array_unique($colors);
            @endphp

            <div class="cart nobottommargin clearfix" >
                <h2 style="float: left;">Choose size</h2><div style="float: right;margin-right: 0;" class="quantity clearfix">


                    @foreach($sizes as $size)
                        <input type="button" name="sizeBu" id="sizeBut{{$size}}" value="{{$size}} " class="plus" onclick="defineSize('{{$size}}')">
                    @endforeach
                </div>


                <h2 style="float: left;clear: both;">Choose color</h2><div style="float: right;margin-right: 0;" class="quantity clearfix">


                    @foreach($colors as $color)
                        <input type="button" name="colorBu" id="colorBut{{$color}}" style="background-color: {{$color}};opacity: .6" class="plus scolor" onclick="defineColor('{{$color}}')">
                    @endforeach
                </div>

                <br>
                <br>

                <div style="clear: both;margin-right: 0;margin-top: 15px;" class="quantity clearfix">

                    <input type="button" id="buttonMinus" value="-" onclick="countMinus('{{$product_Details}}')" class="minus">
                    <input type="text" id="count" name="quantity" value="0" title="Qty" class="qty" size="4">
                    <input type="button" id="buttonPlus" value="+" onclick="countPlus('{{$product_Details}}')" class="plus">
                </div>

                <div style="float: right;">
                    <div class="contact-form-result"></div>
                    <form class="cart nobottommargin clearfix" action="#" id="addtocard" method="post">
                        <div class="form-process"></div>
                        <button type="submit" id="add-to-cart" class="add-to-cart button nomargin" data-token="{{ csrf_token() }}" >Add to cart</button>
                    </form>
                    <form class="cart nobottommargin clearfix" method="post"  action="#">
                        {{ csrf_field() }}
                        <div class="form-process"></div>
                        <p style="color:#ff0400;text-align: center;padding: 5px;cursor: pointer;"> <button type="submit" id="add-to-wishlist" class="add-to-wishlist" data-token="{{ csrf_token() }}" style="background-color: white ;opacity: .6;border: hidden">
                                @if($inWhishlist)
                                    <i id="iconheart" class="fas fa-heart"></i>In wishlist
                                @else
                                    <i id="iconheart" class="far fa-heart"></i>Add to wishlist
                                @endif
                            </button></p>
                    </form>

                </div>
            </div>

            <!-- Product Single - Quantity & Cart Button End -->




            <div class="clear"></div>
            <div class="line"></div>



            <div class="clear"></div>
            <div class="line"></div>
            <p>Libero velit id eaque ex quae laboriosam nulla optio doloribus! Perspiciatis, libero, neque, perferendis at nisi optio dolor!</p>
            <ul class="iconlist">
                <li><i class="icon-caret-right"></i> Dynamic Color Options</li>
                <li><i class="icon-caret-right"></i> Lots of Size Options</li>
                <li><i class="icon-caret-right"></i> 30-Day Return Policy</li>
            </ul>
            <div class="panel panel-default product-meta">
                <div class="panel-body">
                    <span itemprop="productID" class="sku_wrapper">views: <span id="pid" class="sku">{{$product->views}}</span></span>
                    <span class="posted_in">Category: <a href="/category/{{$category->catName}}/{{$category->name}}" rel="tag">{{$category->catName}}/{{$category->name}}</a>.</span>
                    <span class="tagged_as">Tags:
                        @foreach($tags as $tag)
                            <a href="#" rel="{{$tag->name}}">{{$tag->name}}</a>,
                        @endforeach

                            			</span>
                </div>
            </div>
        </div>

    </div>

</div>

<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var sizeF;
    var colorF;
    var selctedSize = 0;
    var selctedColor = 0;
    var selectedAmount=0;
    var SelectedProd_ID=0;
    var quntity = parseInt(document.getElementById('count').value);
    var product_ID = {{$product->id}} ;
    var product_DetailsA = @php echo json_encode($product_Details); @endphp ;
    var id = "{{$product->id}}";
    var clist = new PouchDB('clist');



    function defineSize(sizeSel) {

        sizeF= sizeSel ;
        $('#count').val("0");
        selectedAmount = 0;

        var buttonId = "sizeBut" + sizeSel;


        var property = document.getElementById(buttonId);
        var nameB = property.name;

        if (nameB == "sizeBuSel") {
            property.style.backgroundColor = "#f2f2f2";
            property.name="sizeBu";
            selctedSize=0;

        }
        else {
            if (selctedSize == 1)
            {
                var property2 = document.getElementsByName("sizeBuSel")[0];
                property2.style.backgroundColor = "#f2f2f2";
                property2.name="sizeBu";
                property.style.backgroundColor = "#ffbb99";
                property.name="sizeBuSel";
            }
            else {
                property.style.backgroundColor = "#ffbb99";
                property.name = "sizeBuSel";
                selctedSize = 1;
            }

        }

    }

    function defineColor(colorSel) {



        colorF= colorSel ;
        $('#count').val("0");
        selectedAmount = 0;

        var buttonId = "colorBut" + colorSel;


        var property = document.getElementById(buttonId);
        var nameB = property.name;
        property.blur();

        if (nameB == "colorBuSel") {
            property.style.outline="none";
            property.name="colorBu";
            selctedColor=0;

        }
        else {
            if (selctedColor == 1)
            {
                var property2 = document.getElementsByName("colorBuSel")[0];
                property2.style.outline="none";
                property2.name="colorBu";
                property.style.outline = "thick solid ";
                property.name="colorBuSel";
            }
            else {
                property.style.outline = "thick solid";
                property.name = "colorBuSel";
                selctedColor = 1;
            }

        }

    }


    function countPlus(product_Details)
    {


        if (selctedColor == 1 && selctedSize == 1) {
            for (var i=0 ; i < product_DetailsA.length; i++)
            {




                if(product_DetailsA[i].color == colorF && product_DetailsA[i].size == sizeF )
                {
                    selectedAmount=product_DetailsA[i].amount;
                    SelectedProd_ID=product_DetailsA[i].id;

                }

            }

            var xx = $('#count').val();
            if (xx < selectedAmount) {
                count = ++xx;
                $('#count').val(count);
            } else {


                swal("There is no more in the stock")

            }


        } else {

            swal("You Didn't Choose any size and color")
        }

    }

    function countMinus()
    {
        var i = $('#count').val();
        if (i > 0)
        {
            count = --i;
            $('#count').val(count);
        }
    }



    $(document).ready(function () {
        $("#add-to-cart").click(function () {


            var quntity = parseInt(document.getElementById('count').value);



            var $data = {};


            var _token = $("input[name='_token']").val();
            $data._token=_token;
            $data.prodD_ID = SelectedProd_ID;
            $data.prod_ID = product_ID;
            $data.amount = quntity;




            $.ajax({
                type: "post",
                url: '{{URL::route('Product.addToCart') }}',
                data: $data ,
                success: function (response) {

                    $('.collapse').collapse('show');

                    if (response.olditem){

                        $('#shopping-cart-count').html(response.totalqty);
                        $("#item"+response.productUp.prodD_id).html(response.quan);
                        $('#top-checkout-price').html(response.totalPrice);


                    }else{

                        $('#shopping-cart-count').html(response.totalqty);
                        $("#top-cart-items").prepend('<div class="top-cart-item clearfix"> <div class="top-cart-item-image"> <a href="/product/"'+response.productUp.id+'><img width="64" height="64" title="'+response.productUp.name+'" desc="'+response.productUp.description+'"  src="'+response.productUp.image+'" alt="'+response.productUp.name+'"></a></div> <div class="top-cart-item-desc"> <a href="/product/'+response.productUp.id+'">'+response.productUp.name+'</a> <span class="top-cart-item-price">£'+response.productUp.price+'</span> <span class="top-cart-item-quantity" id="item'+response.productUp.prodD_id+'" pprice="items'+response.productUp.id+'">'+response.quan+'</span> </div> </div>');

                        $('#top-checkout-price').html(response.totalPrice);
                    }




                    if (quntity>0){swal('Product added to cart');



                    }
                    else {swal('Please Chose amount for this product first');}

                },
                error: function () {
                    if (quntity>0){swal('Product added before');}
                    else {swal('Please Chose amount for this product first');}

                }
            });
            return false;

        });

        $("#add-to-wishlist").click(function () {


            var $data = {};

            var _token = $("input[name='_token']").val();
            $data._token=_token;
            $data.prodD_ID = id;




            $.ajax({
                type: "post",
                url: '{{URL::route('Product.addWishList') }}',
                data: $data ,
                success: function (data) {
                    swal("Product added to WishList");
                    $('.collapse').collapse('show');
                    $('#add-to-wishlist').html("<i id=\"iconheart\" class=\"fas fa-heart\"></i>In wishlist");
                },
                error: function () {
                    swal('Product added before in WishList');
                    $('#iconheart').attr('class', 'fas fa-heart');
                }
            });
            return false;

        });




    });//document ready







</script>