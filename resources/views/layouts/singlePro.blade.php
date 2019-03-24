@extends('layouts.app')

@section('content')

    <script src="{{asset('js/jquery.elevateZoom-3.0.8.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.min.js"></script>

    <style>
        .jssocials-share:last-child
        {
            margin-right: 10px!important;
        }
    </style>
    <section id="page-title">

        <div class="container clearfix">
            <h1>{{$product->name}}</h1>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li><a href="/shop">Shop</a></li>
                <li class="active">Shop Single</li>
            </ol>
        </div>

    </section><!-- #page-title end -->
    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="single-product">

                    <div class="product">

                        <div class="col_two_fifth">

                            <!-- Product Single - Gallery
                            ============================================= -->
                            <div class="product-image">
                                <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                                    <div class="flexslider">
                                        <div class="slider-wrap" data-lightbox="gallery">
                                            @php
                                                $images = explode("*", $product->add_images);
                                               //$images = array_pop($images);
                                            @endphp
                                            <div class="slide" data-thumb="{{asset($product->image)}}"><a href="{{asset($product->image)}}"  data-lightbox="gallery-item"><img src="{{asset($product->image)}}"  alt="{{$product->name}}"></a></div>
                                            @foreach($images as $image )
                                                <div class="slide" data-thumb="{{asset($image)}}"><a href="{{asset($image)}}"  data-lightbox="gallery-item"><img src="{{asset($image)}}" alt="{{$product->name}}"></a></div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @if($product->sale)
                                    <div class="sale-flash">{{$product->discount}}% Off*</div>
                                @endif
                            </div><!-- Product Single - Gallery End -->

                        </div>

                        <div class="col_two_fifth product-desc">

                            <!-- Product Single - Price
                            ============================================= -->
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

                            </div><!-- Product Single - Price End -->

                            <!-- Product Single - Rating
                            ============================================= -->
                            <div style="text-align:right;" class="product-rating">
                                @php
                                    $review = $product->avgreview;
                                    $filled = $review;
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
                            </div><!-- Product Single - Rating End -->

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

                            <!-- Product Single - Short Description
                            ============================================= -->
                            <p>{{$product->description}}</p>
                            <!-- Product Single - Short Description End -->

                            <!-- Product Single - Meta
                            ============================================= -->
                            <div class="panel panel-default product-meta">
                                <div class="panel-body">
                                    <span itemprop="productID" class="sku_wrapper">Views: <span id="pid" class="sku">{{$product->views}}</span></span>
                                    <span class="posted_in">Category: <a href="/category/{{$category->catName}}/{{$category->name}}" rel="tag">{{$category->catName}}/{{$category->name}}</a>.</span>
                                    <span class="tagged_as">Tags:
                                        @foreach($tags as $tag)
												<a href="#" rel="{{$tag->name}}">{{$tag->name}}</a>,
                                            @endforeach

                            			</span>
                                </div>
                            </div><!-- Product Single - Meta End -->

                            <!-- Product Single - Share
                            ============================================= -->
                            <div class="si-share noborder clearfix">
                                <span>Share:</span>
                                <div id="shares" link="{{$product->id}}">

                                </div>
                            </div><!-- Product Single - Share End -->

                        </div>

                        <div class="col_one_fifth col_last">

                            <a href="#" title="Brand Logo" class="hidden-xs"><img class="image_fade" src="{{asset("images/shop/brand.jpg")}}" alt="Brand Logo"></a>

                            <div class="divider divider-center"><i class="icon-circle-blank"></i></div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-thumbs-up2"></i>
                                </div>
                                <h3>100% Original</h3>
                                <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-credit-cards"></i>
                                </div>
                                <h3>Payment Options</h3>
                                <p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-truck2"></i>
                                </div>
                                <h3>Free Shipping</h3>
                                <p class="notopmargin">Free Delivery to 100+ Locations on orders above £40.</p>
                            </div>

                            <div class="feature-box fbox-plain fbox-dark fbox-small">
                                <div class="fbox-icon">
                                    <i class="icon-undo"></i>
                                </div>
                                <h3>30-Days Returns</h3>
                                <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                            </div>

                        </div>

                        <div class="col_full nobottommargin">
                            @if (Session::has('message'))
                                <div class="alert alert-info">{{ Session::get('message') }}</div>
                            @endif

                            <div class="tabs clearfix nobottommargin" id="tab-1">

                                <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                                    <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-2" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="#tabs-2" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1"><i class="icon-info-sign"></i><span class="hidden-xs"> Additional Information</span></a></li>
                                    <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-3" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="#tabs-3" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2"><i class="icon-star3"></i><span class="hidden-xs"> Reviews ({{sizeof($reviews)}})</span></a></li>
                                </ul>

                                <div class="tab-container">

                                    <div class="tab-content clearfix" id="tabs-2">

                                        <table class="table table-striped table-bordered">
                                            <tbody>
                                            <tr>
                                                <td>Size</td>
                                                <td>@foreach($sizes as $size)

                                                        " {{$size}} "

                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Color</td>
                                                <td>@foreach($colors as $color)
                                                        " <input type="button" name="colorBu" id="colorBut{{$color}}" style="background-color: {{$color}};opacity: .6" class="plus scolor" disabled>
                                                        "
                                                    @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                @php
                                                    $info = $product->add_info;
                                                    $inf = (explode(";", $info));
                                                    for ($i = 0 ; $i < sizeof($inf) ; $i++)
                                                    {
                                                       $ins = (explode(":", $inf[$i]));
                                                       echo('<tr><td>'.$ins[0].'</td><td>'.$ins[1].'</td></tr>');
                                                    }
                                                @endphp
                                            </tr>
                                            </tbody>
                                        </table>


                                    </div>
                                    <div class="tab-content clearfix" id="tabs-3">

                                        <div id="reviews" class="clearfix">

                                            <ol class="commentlist clearfix">
                                                @if (!empty($reviews))
                                                    @foreach($reviews as $review)
                                                        <li class="comment even thread-even depth-1" id="li-comment-1">
                                                            <div id="comment-1" class="comment-wrap clearfix">

                                                                <div class="comment-meta">
                                                                    <div class="comment-author vcard">
                                                            <span class="comment-avatar clearfix">
                                                            <img alt="" src="{{asset('images/author/1.png')}}" height="60" width="60"></span>
                                                                    </div>
                                                                </div>

                                                                <div class="comment-content clearfix">
                                                                    <div class="comment-author">{{$review->writer}}
                                                                        <span>{{$review->created_at}}</span>
                                                                    </div>
                                                                    <p>{{$review->comment}}</p>
                                                                    <div style="text-align:right;" class="review-comment-ratings">
                                                                        @php
                                                                            $review = $review->rate_value;
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
                                                                </div>
                                                                <div class="clear"></div>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                @endif
                                            </ol>

                                            <!-- Modal Reviews
                                            ============================================= -->



                                            <a href="#" data-toggle="modal" data-target="#reviewFormModal" class="button button-3d nomargin fright">Add a Review</a>

                                            <div class="modal fade" id="reviewFormModal" tabindex="-1" role="dialog" aria-labelledby="reviewFormModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form class="nobottommargin" id="reviewform" method="post" action="/addreview/{{$product->id}}">

                                                                <div class="clear"></div>

                                                                <div class="col_full col_last">
                                                                    <label for="template-reviewform-rating">Rating</label>
                                                                    <select id="reviewrating" name="reviewrating" class="form-control">
                                                                        <option value="">-- Select One --</option>
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                        <option value="4">4</option>
                                                                        <option value="5">5</option>
                                                                    </select>
                                                                </div>

                                                                <div class="clear"></div>

                                                                <div class="col_full">
                                                                    <label for="template-reviewform-comment">Comment <small>*</small></label>
                                                                    <textarea class="required form-control" id="reviewcomment" name="reviewcomment" rows="6" cols="30"></textarea>
                                                                </div>


                                                                <div class="col_full nobottommargin">
                                                                    {{ csrf_field() }}
                                                                    <button class="button button-3d nomargin" type="submit" id="reviewform-submit" name="reviewform-submit" data-token="{{ csrf_token() }}" >Submit Review</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div><!-- /.modal-content -->
                                                </div><!-- /.modal-dialog -->
                                            </div><!-- /.modal -->
                                            <!-- Modal Reviews End -->

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>


                <div class="tab-contrainer">
                    <div class="clear"></div><div class="line"></div>
                    <div class="fancy-title title-border title-center topmargin-sm">
                        <h4 id="tmpp">Related Products</h4>
                    </div>
                    <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

                        @foreach ($similarProducts as $Sproduct)
                            <div class="oc-item" >
                                <div class="product clearfix">
                                    <div class="product-image">
                                        @php
                                            $images = explode('*' , $Sproduct->add_images);
                                            $image1 = $Sproduct->image;
                                        @endphp
                                        <a href="/product/{{$Sproduct->id}}"><img title="{{$Sproduct->name}}" src="{{asset($image1)}}" ></a>
                                        <a href="/product/{{$Sproduct->id}}"><img title="{{$Sproduct->name}}" src="{{asset($images[0])}}"></a>
                                        @if($Sproduct->sale)
                                            <div class="sale-flash">{{$Sproduct->discount}}% Off*</div>
                                        @endif
                                        <div class="product-overlay">

                                            <a href="/quickview/{{$Sproduct->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="/product/{{$Sproduct->id}}">{{$Sproduct->name}}</a></h3></div>
                                        <div class="product-price">£{{$Sproduct->price}}</div>
                                        <div class="product-rating">
                                            @php
                                                $review = $Sproduct->avgreview;
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
                                        <h3 class="mlike" onclick="like(event)" liked="false" id="{{$Sproduct->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$Sproduct->likes}}</span></h3>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

                <div class="tab-contrainer">
                    <div class="clear"></div><div class="line"></div>
                    <div class="fancy-title title-border title-center topmargin-sm">
                        <h4 id="tmpp">Featured Products</h4>
                    </div>
                    <div id="oc-product" class="owl-carousel product-carousel carousel-widget" data-margin="30" data-pagi="false" data-autoplay="5000" data-items-xxs="1" data-items-sm="2" data-items-md="3" data-items-lg="4">

                        @foreach ($featuredProducts as $Fproduct)
                            <div class="oc-item" >
                                <div class="product clearfix">
                                    <div class="product-image">
                                        @php
                                            $images = explode('*' , $Fproduct->add_images);
                                            $image1 = $Fproduct->image;
                                        @endphp
                                        <a href="/product/{{$Fproduct->id}}"><img title="{{$Fproduct->name}}" src="{{asset($image1)}}" ></a>
                                        <a href="/product/{{$Fproduct->id}}"><img title="{{$Fproduct->name}}" src="{{asset($images[0])}}"></a>
                                        @if($Fproduct->sale)
                                            <div class="sale-flash">{{$Fproduct->discount}}% Off*</div>
                                        @endif
                                        <div class="product-overlay">

                                            <a href="/quickview/{{$Fproduct->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="/product/{{$Fproduct->id}}">{{$Fproduct->name}}</a></h3></div>
                                        <div class="product-price">£{{$Fproduct->price}}</div>
                                        <div class="product-rating">
                                            @php
                                                $review = $Fproduct->avgreview;
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
                                        <h3 class="mlike" onclick="like(event)" liked="false" id="{{$Fproduct->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$Fproduct->likes}}</span></h3>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>


            </div>

        </div>

    </section><!-- #content end -->

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
        var quntity = document.getElementById('count').value;
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






            $(".fslider img").elevateZoom();


            $("#shares").jsSocials({
                shares: ["email", "twitter", "facebook", "googleplus", "linkedin", "pinterest", "stumbleupon", "pocket", "whatsapp", "viber", "messenger", "vkontakte", "telegram", "line"],
                url: "https://beyondglee.com/product/" + id,
                text: "Haaa..",
                showLabel: false,
                showCount: false,
                shareIn: "popup"
            });

            $(".mlike").click(function () {



                var liked = this.getAttribute('liked');
                var id = parseInt(this.id);
                var element = this;


                var $data = {};


                var _token = $("input[name='_token']").val();
                $data._token=_token;
                $data.prod_ID =id;
                $data.liked = liked;




                $.ajax({
                    type: "post",
                    url: '{{URL::route('Product.like') }}',
                    data: $data ,
                    success: function (response) {

                        $('.collapse').collapse('show');


                        if (liked != 'true')
                        {
                            element.setAttribute('liked','true');
                            element.querySelector('.likes').innerText = response.likesCount;

                        }
                        else
                        {

                            element.setAttribute('liked','false');
                            element.querySelector('.likes').innerText = response.likesCount;

                        }



                    },
                    error: function () {
                        swal('Some Thing Wrong');
                    }
                });
                return false;

            });



        });//document ready






    </script>


@endsection


