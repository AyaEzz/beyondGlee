@extends('layouts.app')


@section('content')


    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Categorey</h1>
            <span>Let's Show</span>
            <ol class="breadcrumb">
                <li><a href="/">Home</a></li>
                <li class="active">Catg.1</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="page-title" style="padding: 0">

			<div class="container2 clearfix">
				<div class="a">
					<img src="{{asset('images/banner.jpg')}}">
				</div>
			</div>
		</section>

    <!-- Content
    ============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <!-- Portfolio Filter
                ============================================= -->
                <ul id="portfolio-filter" class="portfolio-filter divcenter clearfix" data-container="#portfolio">

                    <li class="activeFilter"><a href="#" data-filter="*">Show All</a></li>
                    @foreach ($catNames as $catName)
                    <li><a href="#" data-filter=".pf-{{$catName}}">{{$catName}}</a></li>
                        @endforeach
                </ul><!-- #portfolio-filter end -->

                <div class="clear"></div>

                <!-- Portfolio Items
                ============================================= -->
                <div id="portfolio" class="portfolio grid-container portfolio-masonry clearfix">


                        @foreach ($products as $product)
                        <article class="portfolio-item pf-{{$product->catName}}">
                            <div class="product clearfix">
                                <div class="product-image">
                                    @php
                                        $images = explode('*' , $product->add_images);
                                        $image1 = $product->image;
                                    @endphp
                                    <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{asset($image1)}}" ></a>
                                    <a href="/product/{{$product->id}}"><img title="{{$product->name}}" src="{{asset($images[0])}}"></a>
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
                        </article>
                        @endforeach











                </div><!-- #portfolio end -->

            </div>

        </div>

    </section><!-- #content end -->


    <script>


        $(document).ready(function () {

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