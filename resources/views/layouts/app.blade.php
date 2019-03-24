<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="author" content="example" />







    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/dark.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/font-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/animate.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials.css" />
    <link type="text/css" rel="stylesheet" href="https://cdn.jsdelivr.net/jquery.jssocials/1.4.0/jssocials-theme-minima.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('slick-theme.css')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{asset('images/icons/favicon.ico')}}"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animate/animate.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/css-hamburgers/hamburgers.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/animsition/css/animsition.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/select2/select2.min.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('vendor/daterangepicker/daterangepicker.css')}}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{asset('css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-social.css')}}">

    <!-- External JavaScripts
    ============================================= -->
    <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/plugins.js')}}"></script>
    <script type="text/javascript" src="https://l2.io/ip.js?var=myip"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/pouchdb@6.4.3/dist/pouchdb.min.js"></script>
    <script async="" defer="" src="//www.instagram.com/embed.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="alert/dist/sweetalert.css">

    <!--[if lt IE 9]>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <![endif]-->

    <!-- SLIDER REVOLUTION 5.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/settings.css')}}" media="screen" />
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/layers.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('include/rs-plugin/css/navigation.css')}}">	@yield('css')

    <title>Bglee Title</title>
    <link rel="shortcut icon" href="{{ asset('images/logo_beyond.jpg')}}" />
    <style>

        .revo-slider-emphasis-text {
            font-size: 58px;
            font-weight: 700;
            letter-spacing: 1px;
            font-family: 'Raleway', sans-serif;
            padding: 15px 20px;
            border-top: 2px solid #FFF;
            border-bottom: 2px solid #FFF;
        }

        .revo-slider-desc-text {
            font-size: 20px;
            font-family: 'Lato', sans-serif;
            width: 650px;
            text-align: center;
            line-height: 1.5;
        }

        .revo-slider-caps-text {
            font-size: 16px;
            font-weight: 400;
            letter-spacing: 3px;
            font-family: 'Raleway', sans-serif;
        }

        .tp-video-play-button { display: none !important; }

        .tp-caption { white-space: nowrap; }

        h3[liked="true"] > i
        {
            background-color: dodgerblue;
        }
        .footer
        {
            display: none;
        }
        .fluid-width-video-wrapper{width:100%;position:relative;padding:0;}.fluid-width-video-wrapper iframe,.fluid-width-video-wrapper object,.fluid-width-video-wrapper embed {position:absolute;top:0;left:0;width:100%;height:100%;}
    </style>

    <style>
        .slick-slide
        {
            margin: 20px;
        }
        .slick-arrow
        {
            color: #4267b2;
            font-size: 36px;
            width: 40px;
            height: 40px;
        }
        .slick-arrow:hover
        {
            color: #4267b2;
            font-size: 42px;
            width: 40px;
            height: 40px;
        }
        .product
        {
            padding: 15px;
        }
        .slick-prev
        {
            left:-5%;
        }
        .slick-next
        {
            right: -5%;
        }
    </style>

    <style>
        #footer .footer-widgets-wrap
        {
            padding: 40px 0;
        }
    </style>

</head>
<body class="stretched" >
    <div id="app">
        <!-- Document Wrapper
    ============================================= -->
    <div id="wrapper" class="clearfix">

        <!-- Top Bar
        ============================================= -->
        <div id="top-bar" class="hidden-xs">

            <div class="container clearfix">

            
                <div class="col_half col_last fright nobottommargin">

                    <!-- Top Links
                    ============================================= -->
                    <div class="top-links">
                    
                        <ul>
                            <li class=""><a href="/wishlist"><i class="icon-heart"></i>Wishlist </a></li>



                                @if (Auth::check())
                                <li>
                                    <a href="/user/{{Auth::user()->name}}" style="cursor:pointer;" class="sf-with-ul">{{ Auth::user()->name }}</a>
                                    @if ((Auth::user()->role_id) != 3)
                                    <ul>
                                        <li>
                                            <a href="/user/{{Auth::user()->name}}" style="cursor:pointer;" class="sf-with-ul">Profile</a>
                                        </li>
                                        <li>
                                            <a href="/admin/AdminPanel" style="cursor:pointer;" class="sf-with-ul">Admin Panel</a>
                                        </li>


                                    </ul>
                                    @endif


                                </li>
                                    <li>
                                    <a href="{{ route('logout') }}" style="cursor:pointer;" class="sf-with-ul">Logout</a>
                                </li>

                                @else
                                    <li>
                                    <a href="/login" style="cursor:pointer;" class="sf-with-ul" >Login</a>
                                    </li>
                            @endif


                        </ul>
                    </div><!-- .top-links end -->
                </div>

        </div><!-- #top-bar end -->

        </div>
<!-- ------------------------------------ Header ------------------------------------- -->
       <header id="header">

            <div id="header-wrap">

                <div class="container clearfix">

                    <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                    <!-- Logo
                    ============================================= -->
                    <div id="logo">
                        <a href="/" class="standard-logo" data-dark-logo="{{ asset('images/logo_beyond.jpg')}}"><img src="{{ asset('images/logo_beyond.jpg')}}" alt="Byond Glee Logo"></a>
                        <a href="/" class="retina-logo" data-dark-logo="{{ asset('images/logo_beyond@2x.jpg')}}"><img src="{{ asset('images/logo_beyond@2x.jpg')}}" alt="Byond Glee Logo"></a>
                    </div>
                    <!-- Primary Navigation
                    ============================================= -->
                    <nav id="primary-menu" class="dark">

                        <div id="top-search">
                            <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                            <form action="{{route('Product.Search')}}" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                            </form>
                        </div><!-- #top-search end -->


                        <ul>



                            <li class="current"><a href="/"><div>Home</div></a>

                            </li>

                            @foreach($categories as $categorey)
                                <li>
                                <a href="/category/{{$categorey->name}}"><div>{{$categorey->name}}</div></a>
                                <ul>

                                    @foreach($subcategories as $subcategory)

                                        @if($subcategory->catg_id == $categorey->id)
                                    <li><a href="/category/{{$categorey->name}}/{{$subcategory->name}}"><div><i class="icon-stack"></i>{{$subcategory->name}}</div></a></li>
                                        @endif

                                    @endforeach
                                </ul>
                                </li>
                            @endforeach


                        </ul>

                        <!-- Top Cart
                        ============================================= -->


                        <div id="top-cart">
                            <a href="#" id="top-cart-trigger"><i class="icon-shopping-cart"></i><span id="shopping-cart-count" class="shopping-cart-count">{{ Session::has('cart') ? Session::get('cart')->totalqty : '0' }}</span></a>
                            <div class="top-cart-content" style="overflow-y: scroll; max-height: 400px">
                                <div class="top-cart-title">
                                    <h4>Shopping Cart</h4>
                                </div>
                                <div class="top-cart-items" id="top-cart-items">

                                    @if(Session::has('cart'))
                                        @php

                                           $cartItems=Session::get('cart');


                                        @endphp

                                    @foreach($cartItems->items as $item)
                                        @php

                                            $product= $item['item'];


                                                @endphp

                                    <div class="top-cart-item clearfix">
                                        <div class="top-cart-item-image">
                                            <a href="/product/{{$product->id}}"><img width="64" height="64" title="{{$product->name}}" desc="{{$product->description}}"  src="{{asset($product->image)}}" alt="{{$product->name}}"></a>
                                        </div>
                                        <div class="top-cart-item-desc">
                                            <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                            <span class="top-cart-item-price">£{{$product->price}}</span>
                                            <span class="top-cart-item-quantity" id="item{{$item['pordD_id']}}" pprice="items{{$product->id}}">{{$item['qty']}}</span>
                                        </div>
                                    </div>
                                @endforeach
                                </div>

                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price" id="top-checkout-price">{{$cartItems->totalPrice}}</span>
                                    <button onclick="location.pathname = '/cart'" class="button button-3d button-small nomargin fright">View Cart</button>
                                </div>

                                @else

                                <div class="top-cart-action clearfix">
                                    <span class="fleft top-checkout-price" id="top-checkout-price">0</span>
                                    <button onclick="location.pathname = '/cart'" class="button button-3d button-small nomargin fright">View Cart</button>
                                </div>



                                @endif


                            </div>
                        </div><!-- #top-cart end -->



                        <!-- Top Search
                        ============================================= -->

                    </nav><!-- #primary-menu end -->

                </div>

            </div>

        </header><!-- #header end -->


        <div class="clear"></div>


        <main class="py-4">
            @yield('content')

        </main>



        <footer id="footer" class="dark">


            <div class="container">
                <div class="footer-widgets-wrap clearfix">

                    <div class="col_two_third">

                        <div class="col_one_third">

                            <div class="widget clearfix">

                                <img src="{{ asset('images/logo_footer.jpg')}}" alt="" class="footer-logo">

                                <p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp; <strong>Flexible</strong> Design Standards.</p>
                            </div>

                        </div>

                        <div class="col_one_third">

                            <div class="widget widget_links clearfix">

                                <ul>
                                    <li><a href="/category/men">Men</a></li>
                                    <li><a href="/category/women">Women</a></li>
                                    <li><a href="/category/acc">Accessories</a></li>
                                    <li><a href="/category/home">Home</a></li>
                                </ul>

                            </div>

                        </div>

                        <div class="col_one_third col_last">
                            <div class="widget widget_links clearfix">
                                <ul>
                                    @if (Auth::check())
                                        <li>
                                            <a href="/user/{{Auth::user()->name}}" style="cursor:pointer;" class="sf-with-ul">{{ Auth::user()->name }}</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('logout') }}" style="cursor:pointer;" class="sf-with-ul">Logout</a>
                                        </li>

                                    @else
                                        <li>
                                            <a href="/login" style="cursor:pointer;" class="sf-with-ul" >Login</a>
                                        </li>

                                    @endif
                                </ul>
                            </div>

                        </div>
                    </div>

                    <div class="col_one_third col_last">

                        <div class="widget widget_links clearfix marginbottom-20">
                            <ul>
                                <li><a href="/terms">Our terms</a></li>
                                <li><a href="/about">About us</a></li>
                                <li><a href="/policy">Privacy Policy</a></li>
                                <li><a href="/contact">Contact Us</a></li>
                                <li><a href="/faq">FAQ</a></li>
                                <li><a href="/distributors">Distributors</a></li>
                            </ul>
                        </div>

                    </div>

                </div><!-- .footer-widgets-wrap end -->

            </div>

            <div id="copyrights">

                <div class="container clearfix">

                    <div class="col_half">
                        Copyrights &copy; 2018 All Rights Reserved by iMeraki Agency<br>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                            <a href="index.html#" class="social-icon si-small si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>

                            <a href="index.html#" class="social-icon si-small si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>

                            <a href="index.html#" class="social-icon si-small si-borderless si-gplus">
                                <i class="icon-gplus"></i>
                                <i class="icon-gplus"></i>
                            </a>

                            <a href="index.html#" class="social-icon si-small si-borderless si-pinterest">
                                <i class="icon-instagram"></i>
                                <i class="icon-instagram"></i>
                            </a>
                        </div>

                        <div class="clear"></div>
                    </div>

                </div>

            </div><!-- #copyrights end -->

        </footer><!-- #footer end -->

    </div><!-- #wrapper end -->

    <div id="gotoTop" class="icon-angle-up"></div>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.video.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.slideanims.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.actions.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.layeranimation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.kenburn.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.navigation.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.migration.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('include/rs-plugin/js/extensions/revolution.extension.parallax.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
    <script src="https://cdn.rawgit.com/alertifyjs/alertify.js/v1.0.10/dist/js/alertify.js"></script>
    <script type="text/javascript" src="{{ asset('js/functions.js')}}"></script>

    <script type="text/javascript">
        var temp = localStorage.getItem('token');

        $(document).ready(function() {
            $.ajaxSetup({headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}});


            var apiRevoSlider = $('.tp-banner').show().revolution(
                {
                    sliderType:"standard",
                    jsFileLocation:"include/rs-plugin/js/",
                    sliderLayout:"fullwidth",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {},
                    responsiveLevels:[1200,992,768,480,320],
                    gridwidth:1140,
                    gridheight:500,
                    lazyType:"none",
                    shadow:0,
                    spinner:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        disableFocusListener:false,
                    },
                    navigation: {
                        keyboardNavigation:"off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation:"off",
                        onHoverStop:"off",
                        touch:{
                            touchenabled:"on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        },
                        arrows: {
                            style: "ares",
                            enable: true,
                            hide_onmobile: true,
                            hide_onleave: true,
                            tmp: '<div class="tp-title-wrap">	<span class="tp-arr-titleholder"></span> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 10,
                                v_offset: 0
                            }
                        }
                    }
                });

            apiRevoSlider.bind("revolution.slide.onloaded",function (e) {
                //webTem.slider.sliderParallaxDimensions();
            });

            $('.selectpicker').selectpicker({
                size: 4,
                style:'huh',
                width:'fit'
            });
        });















        </script>

    </div>
</body>
</html>
