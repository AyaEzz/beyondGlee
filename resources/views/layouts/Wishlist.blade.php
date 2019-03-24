@extends('layouts.app')

@section('content')


    <!-- Page Title
		============================================= -->
    <!-- Page Title
         ============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Wishlist</h1>
            <span>All your product which you are interested in</span>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active">Wishlist</li>
            </ol>
        </div>

    </section><!-- #page-title end -->


    <div class="table-responsive bottommargin">

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table cart" style="margin-bottom:40%;">
            <thead>
            <tr>
                <th class="cart-product-remove">&nbsp;</th>
                <th class="cart-product-thumbnail">&nbsp;</th>
                <th class="cart-product-name">Product</th>
                <th class="cart-product-price">Unit Price</th>
            </tr>
            </thead>
            <tbody>

            @foreach($whishlistProducts as $product)



            <tr class="cart_item">
                <td class="cart-product-remove">
                    <a href="/removewishlist/{{$product->id}}" class="remove" ><i class="icon-trash"></i></a>
                </td>

                <td class="cart-product-thumbnail">
                    <a href="/product/{{$product->id}}"><img width="64" height="64" title="{{$product->name}}" desc="{{$product->description}}"  src="{{$product->image}}" ></a>
                </td>

                <td class="cart-product-name">
                    <a href="/product/{{$product->id}}">{{$product->name}}</a>
                </td>

                <td class="cart-product-price">
                    <span class="amount">£{{$product->price}}</span>
                </td>
            </tr>

                @endforeach

            </tbody>
        </table>
    </div>

@endsection