@extends('layouts.app')


@section('content')

    @if(!empty($makeSession))
        <script>
            $(document).ready(function (){
                var token = {{$token}};
                alert(token);
            });
        </script>
    @endif

    <section id="slider" class="slider-parallax revslider-wrap ohidden clearfix">
        <div class="tp-banner-container">
            <div class="tp-banner" >
                <ul>    <!-- SLIDE  -->
                    <li data-transition="fade" data-slotamount="1" data-masterspeed="1500" data-delay="10000" data-saveperformance="off" data-title="Latest Collections" style="background-color: #F6F6F6;">
                        <!-- LAYERS -->

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="100"
                             data-y="50"
                             data-customin="x:-200;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="{{asset('images/slider/rev/shop/girl1.jpg')}}" alt="Girl"></div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="570"
                             data-y="75"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Get your Shopping Bags Ready</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="570"
                             data-y="105"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 430px; line-height: 1.15;">Latest Fashion<br>Collections</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="570"
                             data-y="275"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333; max-width: 550px; white-space: normal;">We have created a Design that looks Awesome, performs Brilliantly &amp; senses Orientations.</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                             data-x="570"
                             data-y="375"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><a href="/shop" class="button button-border button-large button-rounded tright nomargin"><span>Start Shopping</span> <i class="icon-angle-right"></i></a></div>

                    </li>

                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="10000"  data-saveperformance="off"  data-title="Messenger bags" style="background-color: #E9E8E3;">
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="630"
                             data-y="78"
                             data-customin="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="{{asset('images/slider/rev/shop/bag.png')}}" alt="Bag"></div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="0"
                             data-y="110"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Buy Stylish Bags at Discounted Prices</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="0"
                             data-y="140"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="color: #333; line-height: 1.15;">Messenger Bags</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="0"
                             data-y="240"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="color: #333; max-width: 550px; white-space: normal;">Grantees insurmountable challenges invest protect, growth improving quality social entrepreneurship.</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                             data-x="0"
                             data-y="340"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><a href="/shop" class="button button-border button-large button-rounded tright nomargin"><span>Start Shopping</span> <i class="icon-angle-right"></i></a></div>

                        <div class="tp-caption customin utb tp-resizeme revo-slider-caps-text uppercase"
                             data-x="510"
                             data-y="0"
                             data-customin="x:0;y:-236;z:0;rotationZ:0;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="600"
                             data-start="2100"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="{{asset('images/slider/rev/shop/tag.png')}}" alt="Bag"></div>

                    </li>

                    <li data-transition="slideup" data-slotamount="1" data-masterspeed="1500" data-delay="10000"  data-saveperformance="off"  data-title="Messenger bags" style="background-color: #ECC8E3;">
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="630"
                             data-y="78"
                             data-customin="x:250;y:0;z:0;rotationZ:0;scaleX:1;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="400"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><img src="{{asset('images/slider/rev/shop/man.png')}}" alt="Bag"></div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption customin ltl tp-resizeme revo-slider-caps-text uppercase"
                             data-x="0"
                             data-y="110"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1000"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=" color: #333;">Buy Stylish Bags at Discounted Prices</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-emphasis-text nopadding noborder"
                             data-x="0"
                             data-y="140"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1200"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="color: #333; line-height: 1.15;">Messenger Bags</div>

                        <div class="tp-caption customin ltl tp-resizeme revo-slider-desc-text tleft"
                             data-x="0"
                             data-y="240"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1400"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style="color: #333; max-width: 550px; white-space: normal;">Grantees insurmountable challenges invest protect, growth improving quality social entrepreneurship.</div>

                        <div class="tp-caption customin ltl tp-resizeme"
                             data-x="0"
                             data-y="340"
                             data-customin="x:0;y:150;z:0;rotationZ:0;scaleX:1.3;scaleY:1;skewX:0;skewY:0;opacity:0;transformPerspective:200;transformOrigin:50% 0%;"
                             data-speed="700"
                             data-start="1550"
                             data-easing="easeOutQuad"
                             data-splitin="none"
                             data-splitout="none"
                             data-elementdelay="0.01"
                             data-endelementdelay="0.1"
                             data-endspeed="1000"
                             data-endeasing="Power4.easeIn" style=""><a href="/shop" class="button button-border button-large button-rounded tright nomargin"><span>Start Shopping</span> <i class="icon-angle-right"></i></a></div>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section id="content" style="margin-bottom: 0px;">

        <div class="content-wrap" style="padding-bottom: 0;">

            <div class="container clearfix">

                <div class="col-xs-8 nopadding">

                    <div class="col-xs-6 noleftpadding bottommargin-sm">
                        <a href="index.html#"><img src="images/shop/banners/2.jpg" alt="Image"></a>
                    </div>

                    <div class="col-xs-6 noleftpadding bottommargin-sm">
                        <a href="index.html#"><img src="images/shop/banners/8.jpg" alt="Image"></a>
                    </div>

                    <div class="clear"></div>

                    <div class="col-xs-12 noleftpadding">
                        <a href="index.html#"><img src="images/shop/banners/4.jpg" alt="Image"></a>
                    </div>

                </div>

                <div class="col-xs-4 nopadding">
                    <a href="index.html#"><img style="width: 99%;" src="images/shop/banners/9.jpg" alt="Image"></a>
                </div>

                <div class="col-xs-12 nopadding" style="margin-top: 10px;">
                    <a href="index.html#"><img src="images/Men1.jpg" alt="Image"></a>
                </div>

                <div class="clear"></div>

                <div class="tabs topmargin-lg clearfix ui-tabs ui-widget ui-widget-content ui-corner-all" id="tab-3">



                <ul class="tab-nav clearfix ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all" role="tablist">
                       <li class="ui-state-default ui-corner-top ui-tabs-active ui-state-active" role="tab" tabindex="0" aria-controls="tabs-9" aria-labelledby="ui-id-1" aria-selected="true" aria-expanded="true"><a href="index.html#tabs-9" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-1">New Arrivals</a></li>
                       <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-10" aria-labelledby="ui-id-2" aria-selected="false" aria-expanded="false"><a href="index.html#tabs-10" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-2">Best sellers</a></li>
                       <li class="ui-state-default ui-corner-top" role="tab" tabindex="-1" aria-controls="tabs-11" aria-labelledby="ui-id-3" aria-selected="false" aria-expanded="false"><a href="index.html#tabs-11" class="ui-tabs-anchor" role="presentation" tabindex="-1" id="ui-id-3">Most Liked Products</a></li>
                   </ul>

                        <div class="tab-container">

                            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-9" aria-labelledby="ui-id-1" role="tabpanel" aria-hidden="false">

                            <div id="shop" class="shop grid-container clearfix" data-layout="fitRows">
                                    @foreach ($recentProducts as $product)
                                        <div class="product clearfix">
                                            <div class="product-image">
                                                @php
                                                    $images = explode('*' , $product->add_images);
                                                    $image1 = $product->image;
                                                @endphp
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$image1}}" ></a>
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$images[0]}}"></a>
                                                @if($product->sale)
                                                    <div class="sale-flash">{{$product->discount}}% Off*</div>
                                                @endif
                                                <div class="product-overlay">

                                                    <a href="/quickview/{{$product->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title"><h3><a href="/product/{{$product->id}}">{{$product->name}}</a></h3></div>
                                                <div class="product-price">£{{$product->price}}</div>
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

                                                <h3 class="mlike" data-token="{{ csrf_token() }}" liked="{{array_key_exists($product->id,$likes->items)? "true" : "false"}}" id="{{$product->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$product->likes}}</span></h3>
                                                <br>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>

                            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-10" aria-labelledby="ui-id-2" role="tabpanel" aria-hidden="true" style="display: none;">

                                <div id="shop" class="shop clearfix" data-layout="fitRows">
                                    @foreach ($featuredProducts as $product)
                                        <div class="product clearfix">
                                            <div class="product-image">
                                                @php
                                                    $images = explode('*' , $product->add_images);
                                                    $image1 = $product->image;
                                                @endphp
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$image1}}" ></a>
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$images[0]}}"></a>
                                                @if($product->sale)
                                                    <div class="sale-flash">{{$product->discount}}% Off*</div>
                                                @endif
                                                <div class="product-overlay">

                                                    <a href="/quickview/{{$product->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title"><h3><a href="/product/{{$product->id}}">{{$product->name}}</a></h3></div>
                                                <div class="product-price">£{{$product->price}}</div>
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
                                                <h3 class="mlike" data-token="{{ csrf_token() }}" liked="{{array_key_exists($product->id,$likes->items)? "true" : "false"}}" id="{{$product->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$product->likes}}</span></h3>
                                                <br>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>

                            <div class="tab-content clearfix ui-tabs-panel ui-widget-content ui-corner-bottom" id="tabs-11" aria-labelledby="ui-id-3" role="tabpanel" aria-hidden="true" style="display: none;">

                                <div id="shop" class="shop clearfix" data-layout="fitRows">
                                    @foreach ($likedProducts as $product)
                                        <div class="product clearfix">
                                            <div class="product-image">
                                                @php
                                                    $images = explode('*' , $product->add_images);
                                                    $image1 = $product->image;
                                                @endphp
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$image1}}" ></a>
                                                <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$images[0]}}"></a>
                                                @if($product->sale)
                                                    <div class="sale-flash">{{$product->discount}}% Off*</div>
                                                @endif
                                                <div class="product-overlay">

                                                    <a href="/quickview/{{$product->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                                </div>
                                            </div>
                                            <div class="product-desc">
                                                <div class="product-title"><h3><a href="/product/{{$product->id}}">{{$product->name}}</a></h3></div>
                                                <div class="product-price">£{{$product->price}}</div>
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
                                                <h3 class="mlike" data-token="{{ csrf_token() }}" liked="{{array_key_exists($product->id,$likes->items)? "true" : "false"}}" id="{{$product->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$product->likes}}</span></h3>
                                                <br>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>


                            </div>

                        </div>

                    </div>





            </div>

        </div>

        <div class="fancy-title title-border title-center topmargin-sm">
            <h4 id="tmpp">Featured Products</h4>
        </div>

        <div class="video-wrap">
            <video poster="images/videos/explore.jpg" preload="none" loop autoplay muted>
                <source src='images/videos/explore.mp4' type='video/mp4' />
                <source src='images/videos/explore.webm' type='video/webm' />
            </video>
            <div class="video-overlay" style="background-color: rgba(0,0,0,0.3);">


                <div class="container clearfix">

                    <div id="oc-products" class="owl-carousel products-carousel carousel-widget" data-margin="20" data-nav="true" data-pagi="false" data-items-xxs="1" data-items-xs="2" data-items-sm="3" data-items-md="5" style="margin-top: 250px;">


                            @foreach ($featuredProducts as $product)
                            <div class="oc-item" >
                                <div class="product clearfix">
                                    <div class="product-image">
                                        @php
                                            $images = explode('*' , $product->add_images);
                                            $image1 = $product->image;
                                        @endphp
                                        <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$image1}}" ></a>
                                        <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{$images[0]}}"></a>
                                        @if($product->sale)
                                            <div class="sale-flash">{{$product->discount}}% Off*</div>
                                        @endif
                                        <div class="product-overlay">

                                            <a href="/quickview/{{$product->id}}" class="item-quick-view" data-lightbox="ajax"><i class="icon-zoom-in2"></i><span> Quick View</span></a>
                                        </div>
                                    </div>
                                    <div class="product-desc">
                                        <div class="product-title"><h3><a href="/product/{{$product->id}}">{{$product->name}}</a></h3></div>
                                        <div class="product-price">£{{$product->price}}</div>
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
                                        <h3 class="mlike" data-token="{{ csrf_token() }}" liked="{{array_key_exists($product->id,$likes->items)? "true" : "false"}}" id="{{$product->id}}" style="float: left;margin-top: 10px;"><i class="i-circled i-small i-alt icon-thumbs-up"></i><span class="likes">{{$product->likes}}</span></h3>
                                        <br>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                    </div>

                </div>

            </div>
        </div>

                   <div class="clear"></div>

                <div class="fancy-title title-border title-center topmargin-sm">
                    <h4 id="tmpp">Glee On Instagram</h4>
                </div>

        <div class="col_full ">
            <div class="content-wrap" style="padding-bottom: 0;">
                <div class="container clearfix">
            <script type="text/javascript" src="{{ asset('slick.min.js')}}"></script>

            <div class="my-class">
                @foreach($instas as $insta)
                    <div style="margin:10px;">
                        <blockquote class="instagram-media" data-instgrm-permalink="{{$insta->url}}" data-instgrm-version="8" style=" background:#FFF; border:0; border-radius:3px; box-shadow:0 0 1px 0 rgba(0,0,0,0.5),0 1px 10px 0 rgba(0,0,0,0.15); margin: 1px; "><div style="padding:8px;"> <div style=" background:#F8F8F8; line-height:0; margin-top:40px; padding:50.0% 0; text-align:center; width:100%;"> <div style=" background:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACwAAAAsCAMAAAApWqozAAAABGdBTUEAALGPC/xhBQAAAAFzUkdCAK7OHOkAAAAMUExURczMzPf399fX1+bm5mzY9AMAAADiSURBVDjLvZXbEsMgCES5/P8/t9FuRVCRmU73JWlzosgSIIZURCjo/ad+EQJJB4Hv8BFt+IDpQoCx1wjOSBFhh2XssxEIYn3ulI/6MNReE07UIWJEv8UEOWDS88LY97kqyTliJKKtuYBbruAyVh5wOHiXmpi5we58Ek028czwyuQdLKPG1Bkb4NnM+VeAnfHqn1k4+GPT6uGQcvu2h2OVuIf/gWUFyy8OWEpdyZSa3aVCqpVoVvzZZ2VTnn2wU8qzVjDDetO90GSy9mVLqtgYSy231MxrY6I2gGqjrTY0L8fxCxfCBbhWrsYYAAAAAElFTkSuQmCC); display:block; height:44px; margin:0 auto -44px; position:relative; top:-22px; width:44px;"></div></div></div>	<script async="" defer="" src="//www.instagram.com/embed.js"></script></blockquote>
                         <a href="/quickview/{{$product->id}}" style="display: block;margin:0 auto;text-align: center;" class="button button-3d button-rounded button-black" data-lightbox="ajax"><i class="icon-shopping-cart"></i>Order</a>
                    
                    </div>
                @endforeach
            </div>
                </div>
            </div>
        </div>


        <div class="clear"></div>
        <div class="container clearfix">
                <div class="col_half">
                    <div class="fancy-title title-border">
                        <h4>About Us</h4>
                    </div>
                    <p>Jane Jacobs educate, leverage affiliate Martin Luther King Jr. agriculture conflict resolution dignity. Cooperation international progress non-partisan lasting change meaningful.</p>
                </div>

                <div class="col_half col_last">
                    <div class="fancy-title title-border">
                        <h4>Connect with Us</h4>
                    </div>

                    <a href="index.html#" class="social-icon si-facebook" data-toggle="tooltip" data-placement="top" title="" data-original-title="Facebook">
                        <i class="icon-facebook"></i>
                        <i class="icon-facebook"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-delicious" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delicious">
                        <i class="icon-delicious"></i>
                        <i class="icon-delicious"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-paypal" data-toggle="tooltip" data-placement="top" title="" data-original-title="PayPal">
                        <i class="icon-paypal"></i>
                        <i class="icon-paypal"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-flattr" data-toggle="tooltip" data-placement="top" title="" data-original-title="Flattr">
                        <i class="icon-flattr"></i>
                        <i class="icon-flattr"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-android" data-toggle="tooltip" data-placement="top" title="" data-original-title="Android">
                        <i class="icon-android"></i>
                        <i class="icon-android"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-smashmag" data-toggle="tooltip" data-placement="top" title="" data-original-title="Smashing Magazine">
                        <i class="icon-smashmag"></i>
                        <i class="icon-smashmag"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-gplus" data-toggle="tooltip" data-placement="top" title="" data-original-title="Google+">
                        <i class="icon-gplus"></i>
                        <i class="icon-gplus"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-wikipedia" data-toggle="tooltip" data-placement="top" title="" data-original-title="Wikipedia">
                        <i class="icon-wikipedia"></i>
                        <i class="icon-wikipedia"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-stumbleupon" data-toggle="tooltip" data-placement="top" title="" data-original-title="StumbleUpon">
                        <i class="icon-stumbleupon"></i>
                        <i class="icon-stumbleupon"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-foursquare" data-toggle="tooltip" data-placement="top" title="" data-original-title="FourSquare">
                        <i class="icon-foursquare"></i>
                        <i class="icon-foursquare"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-call" data-toggle="tooltip" data-placement="top" title="" data-original-title="Call">
                        <i class="icon-call"></i>
                        <i class="icon-call"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-ninetyninedesigns" data-toggle="tooltip" data-placement="top" title="" data-original-title="Ninety Nine Design">
                        <i class="icon-ninetyninedesigns"></i>
                        <i class="icon-ninetyninedesigns"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-forrst" data-toggle="tooltip" data-placement="top" title="" data-original-title="Forrst">
                        <i class="icon-forrst"></i>
                        <i class="icon-forrst"></i>
                    </a>

                    <a href="index.html#" class="social-icon si-digg" data-toggle="tooltip" data-placement="top" title="" data-original-title="Digg">
                        <i class="icon-digg"></i>
                        <i class="icon-digg"></i>
                    </a>
                </div>
        </div>

            

            </div>

            <div class="section nobottommargin">
                <div class="container clearfix">

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-thumbs-up2"></i>
                            </div>
                            <h3>100% Original</h3>
                            <p class="notopmargin">We guarantee you the sale of Original Brands.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-credit-cards"></i>
                            </div>
                            <h3>Payment Options</h3>
                            <p class="notopmargin">We accept Visa, MasterCard and American Express.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-truck2"></i>
                            </div>
                            <h3>Free Shipping</h3>
                            <p class="notopmargin">Free Delivery to 100+ Locations on orders above £40.</p>
                        </div>
                    </div>

                    <div class="col_one_fourth nobottommargin col_last">
                        <div class="feature-box fbox-plain fbox-dark fbox-small">
                            <div class="fbox-icon">
                                <i class="icon-undo"></i>
                            </div>
                            <h3>30-Days Returns</h3>
                            <p class="notopmargin">Return or exchange items purchased within 30 days.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

     
       <div class="section notopborder nobottomborder nomargin nopadding nobg footer-stick">
                    <div class="container clearfix">

                        <div class="col_half nobottommargin topmargin">
                            <img src="images/services/4.jpg" alt="Image" class="nobottommargin">
                        </div>

                        <div class="col_half subscribe-widget nobottommargin col_last">

                            <div class="heading-block topmargin-lg">
                                <h3><strong>GET 20% OFF*</strong></h3>
                                <span>Our App scales beautifully to different Devices.</span>
                            </div>

                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet cumque, perferendis accusamus porro illo exercitationem molestias.</p>

                           

                        </div>

                    </div>
                </div>
                <div class="clear"></div>

    </section>

    @if(!empty($token))
        <script>
            var token = "{{$token}}";
            localStorage.setItem("token" , token);

            setTimeout(function() { $('.autha').remove(); } , 500);


        </script>
    @endif

    <script>

        $(document).ready(function () {

            $('.your-class').slick({arrows: true , rows:7 , slidesPerRow: 7 , infinite:true , mobileFirst : true , dots : true, variableWidth : true , autoPlay:true });
            $('.my-class').slick({
                dots: true,
                infinite: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
                ]
            });
            var left =  '<i style="z-index:0;" class="fa fa-arrow-circle-left" aria-hidden="true"></i>';
            var right = '<i style="z-index:0;" class="fa fa-arrow-circle-right" aria-hidden="true"></i>';

            $('.slick-prev').html(left);
            $('.slick-next').html(right);

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


    <style>
        .video-wrap{
            float:left;

        }
        .video-overlay {
            position: absolute;
           
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10;
            background-color: rgba(0,0,0,0.5); /*dim the background*/
        }

    </style>
@endsection