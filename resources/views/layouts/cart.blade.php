
@extends('layouts.app')

@section('content')


    <!-- Page Title
		============================================= -->
    <section id="page-title">

        <div class="container clearfix">
            <h1>Cart</h1>
            <ol class="breadcrumb">
                <li><a href="#">Home</a></li>
                <li><a href="#">Shop</a></li>
                <li class="active">Cart</li>
            </ol>
        </div>

    </section><!-- #page-title end -->

    <section id="content">

    <div class="content-wrap">

        <div class="container clearfix">

            <div class="table-responsive bottommargin">

                @if (Session::has('message'))
                    <div class="alert alert-info">{{ Session::get('message') }}</div>
                @endif



                <table class="table cart">
                    <thead>
                    <tr>
                        <th class="cart-product-remove">&nbsp;</th>
                        <th class="cart-product-thumbnail">&nbsp;</th>
                        <th class="cart-product-name">Product</th>
                        <th class="cart-product-price">Unit Price</th>
                        <th class="cart-product-size">Size</th>
                        <th class="cart-product-Color">Color</th>
                        <th class="cart-product-quantity">Quantity</th>
                        <th class="cart-product-subtotal">Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cartProducts as $product)

                    <tr class="cart_item">
                        <td class="cart-product-remove">
                            <a href="/removeCartItem/{{$product->prodD_id}}" class="remove" title="Remove this item"><i class="icon-trash"></i></a>
                        </td>

                        <td class="cart-product-thumbnail">
                            <a href="/product/{{$product->id}}"><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></a>
                        </td>

                        <td class="cart-product-name">
                            <a href="/product/{{$product->id}}">{{$product->name}}</a>
                        </td>

                        <td class="cart-product-price">
                            <span class="amount" id="price{{$product->prodD_id}}" value="{{$product->price}}">£{{$product->price}}</span>
                        </td>

                        <td class="cart-product-size">

                            <input type="button" name="sizeBu" id="sizeBut" style="background-color: white; border: none " value="{{$product->size}} " class="plus" >
                        </td>

                        <td class="cart-product-color">
                            <input type="button" name="colorBu" id="colorBut" style="background-color: {{$product->color}};opacity: .4 ; border: none" class="plus scolor" >
                        </td>

                        @php
                            $cartIems = $cart->items[$product->prodD_id];

                        @endphp

                        <td class="cart-product-quantity">
                            <div class="quantity clearfix">
                                <input type="button" value="-" class="minus" onclick="countMinus('{{$product->prodD_id}}','{{$product->maxAmount}}','{{$product->price}}')">
                                <input type="text" name="quantity" id="quantity{{$product->prodD_id}}" value="{{$cartIems['qty']}}" class="qty" />
                                <input type="button" value="+" class="plus" onclick="countPlus('{{$product->prodD_id}}','{{$product->maxAmount}}','{{$product->price}}')">
                            </div>
                        </td>



                        <td class="cart-product-subtotal">
                            <span class="amount" id="total{{$product->prodD_id}}">{{$cartIems['price']}}</span>
                        </td>
                    </tr>

                    @endforeach

                    <tr class="cart_item">
                        <form id="shipping-form" name="shipping-form" class="nobottommargin" action="{{route('Cart.copoun')}}" method="post">
                            {{ csrf_field() }}
                        <td colspan="6">
                            <div class="row clearfix">
                                <div class="col-md-4 col-xs-4 nopadding">
                                    <div class="col-md-8 col-xs-7 nopadding">
                                        <input type="text" name="Coupon" id="Coupon" class="sm-form-control" placeholder="Enter Coupon Code.." />
                                    </div>
                                    <div class="col-md-4 col-xs-5">
                                        <button type="submit" class="button button-3d button-black nomargin">Apply Coupon</button>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </form>
                    </tr>

                    </tbody>

                </table>

            </div>

            <div class="row clearfix">
                <div class="col-md-6 clearfix">
                    <h4>Calculate Shipping</h4>
                    <form>
                        <div class="col_full">
                            <select id="country" class="sm-form-control">
                                <option value="Egypt">Egypt</option>
                            </select>
                        </div>

                        <div class="col_full">
                            <select id="gover" class="sm-form-control" autocomplete="off">
                                <option selected="true" disabled="disabled">Choose Tagging</option>
                                @foreach($shipping as $shipItem)
                                <option value="{{$shipItem->price}}_{{$shipItem->state}}">{{$shipItem->state}}</option>
                                    @endforeach
                            </select>
                        </div>

                        <a href="/checkout" id="checkout" class="button button-3d notopmargin fright">Proceed to Checkout</a>
                    </form>
                </div>

                <div class="col-md-6 clearfix">
                    <div class="table-responsive">
                        <h4>Cart Totals</h4>

                        <table class="table cart">
                            <tbody>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Cart Subtotal</strong>
                                </td>

                                <td class="cart-product-name">
                                    $<span class="amount" id="finalCartSubtotal" name ="{{$totalPrice}}" >{{$totalPrice}}</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Shipping</strong>
                                </td>

                                <td class="cart-product-name">
                                    $<span class="ShippingAmount" id="ShippingAmount">00.00</span>
                                </td>
                            </tr>
                            <tr class="cart_item">
                                <td class="cart-product-name">
                                    <strong>Total</strong>
                                </td>

                                <td class="cart-product-name">
                                    <span class="amount color lead"><strong>$</strong></span><span class="amount color lead" ><strong id="finalCartTotal">{{$totalPrice}}</strong></span>
                                </td>
                            </tr>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </div>

</section>

    <script>

        var StateTT = document.getElementById("gover").value;
        var StateArray = StateTT.split('_');

        var StateSh = parseInt(StateArray[0]);

        var TotalPrice = parseInt({{$totalPrice}});

        $("#gover").on("change", function() {
           var str = this.value;
            var Stateval = str.split('_');


            StateSh = parseInt(Stateval);

            $('#ShippingAmount').html(StateSh);
            $('#finalCartTotal').html(TotalPrice+StateSh);
        });

        function countPlus(id , maxAmount , price)
        {






                var xx = parseInt(document.getElementById('quantity'+id).value);
                if (xx < maxAmount) {
                    xx = ++xx;
                    document.getElementById('quantity'+id).value=xx;

                    var $data = {};

                    var _token = $("input[name='_token']").val();
                    $data._token=_token;
                    $data.prodD_ID = id;
                    $data.val=1;



                    $.ajax({
                        type: "post",
                        url: '{{URL::route('Card.modifyCart') }}',
                        data: $data ,
                        success: function (response) {

                            if (response.status = "succeeded"){

                                $('.collapse').collapse('show');
                                $('#shopping-cart-count').html(response.totalqty);
                                $('#item'+id).html(response.itemQty);
                               // $('#quantity'+id).html(response.itemQty);
                                $('#top-checkout-price').html(response.totalPrice);
                                $('#finalCartSubtotal').html(response.totalPrice);
                                $('#finalCartTotal').html(response.totalPrice);

                                $('#total'+id).html(response.itemPrice);
                               // console.log(response);
                            }else {

                                swal('You Have Applied Coupon already if you want to change quantity remove and item again');
                            }



                        },
                        error: function () {
                            swal('Something wrong');
                        }
                    });
                    return false;


                } else {


                    swal("There is no more in the stock")

                }










        }

        function countMinus(id , maxAmount,price)
        {
            var i = document.getElementById('quantity'+id).value;
            if (i > 1)
            {
                i = --i;
                document.getElementById('quantity'+id).value=i;

                var $data = {};

                var _token = $("input[name='_token']").val();
                $data._token=_token;
                $data.prodD_ID = id;
                $data.val=2;



                $.ajax({
                    type: "post",
                    url: '{{URL::route('Card.modifyCart') }}',
                    data: $data ,
                    success: function (response) {

                        if (response.status = "succeeded"){

                            $('.collapse').collapse('show');
                            $('#shopping-cart-count').html(response.totalqty);
                            $('#item'+id).html(response.itemQty);
                            // $('#quantity'+id).html(response.itemQty);
                            $('#top-checkout-price').html(response.totalPrice);
                            $('#finalCartSubtotal').html(response.totalPrice);
                            $('#finalCartTotal').html(response.totalPrice);

                            $('#total'+id).html(response.itemPrice);
                            // console.log(response);
                        }else {

                            swal('You Have Applied Coupon already if you want to change quantity remove and item again');
                        }


                    },
                    error: function () {
                        swal('Something wrong');
                    }
                });
                return false;
            }
        }

    </script>

@endsection
