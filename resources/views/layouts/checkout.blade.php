
@extends('layouts.app')

@section('content')
<section id="content" style="margin-bottom: 0px;">
        <div class="content-wrap">

            <div class="container clearfix">
                <div class="row clearfix">
                    <form id="shipping-form" name="shipping-form" class="nobottommargin" action="{{route('Checkout.setCheckout')}}" method="post">
                        {{ csrf_field() }}
                    <div class="col-xs-12">
                        <h3 class="">Shipping Address</h3>  


                            <div class="col_full">
                                <label for="shipping-form-name">Name:</label>
                                <input type="text" required id="pname" name="pname" value="{{$user->name}}" placeholder="{{$user->name}}" class="sm-form-control" >
                            </div>

                            <div class="clear"></div>

                            <div class="col_full">
                                    <label for="shipping-form-country">Country:</label>
                                    <select id="country" name="country" class="sm-form-control">
                                        <option value="Egypt">Egypt</option>
                                    </select>
                                </div>
        
                                <div class="col_full">
                                        <label for="shipping-form-government">Government:</label>
                                        <select id="gover" name="gover" class="sm-form-control" autocomplete="off" required>
                                            <option selected="true" disabled="disabled">Choose Tagging</option>
                                            @foreach($shipping as $shipItem)
                                                <option {{($shipItem->state==$user->state) ? 'selected=true':''}} value="{{$shipItem->price}}_{{$shipItem->state}}">{{$shipItem->state}}</option>
                                            @endforeach
                                        </select>
                                </div>
                            
                            <div class="col_full">
                                <label for="shipping-form-city">AREA</label>
                                <input type="text" required id="parea" name="parea" value="" class="sm-form-control" >
                            </div>
                            
                            <div class="col_full">
                                <label for="shipping-form-message">Address </label>
                                <textarea class="sm-form-control" required id="address" name="address" rows="5" cols="30" value="{{$user->address}}" placeholder="{{$user->address}}"></textarea>
                            </div>

                            <div class="col_one_third">
                                <label for="shipping-form-name">Floor:</label>
                                <input type="text" minlength="1" maxlength="3" pattern="[0-9]+" required id="floor" name="floor" value="" class="sm-form-control">
                            </div>

                            <div class="col_one_third">
                                <label for="shipping-form-lname">#Appart:</label>
                                <input type="text" minlength="1" maxlength="6" pattern="[0-9]+" required id="apart" name="apart" value="" class="sm-form-control">
                            </div>

                            <div class="col_one_third col_last">
                                <label for="shipping-form-otime">Order Time:</label>
                                <select id="orderTime" name="orderTime" class="sm-form-control">
                                    <option value="AM">AM</option>
                                    <option value="PM">PM</option>
                                </select>
                            </div>

                            <div class="col_full">
                                <label for="shipping-form-address">Phone(1):</label>
                                <input type="text" minlength="10" maxlength="14" pattern="[0-9]+" required id="phone"  name="phone" value="{{$user->phone}}" placeholder="{{$user->phone}}" class="sm-form-control">
                            </div>

                            <div class="col_full">
                                <label for="shipping-form-address">Phone(2):</label>
                                <input type="text" minlength="10" maxlength="14" pattern="[0-9]+" id="aphone" name="aphone" value="" class="sm-form-control">
                            </div>

                            <div class="col_full">
                                <label for="shipping-form-message">Notes</label>
                                <textarea class="sm-form-control" id="notes" name="notes" rows="6" cols="30" value=" "></textarea>
                            </div>

                            <div class="col_full">
                                <label for="shipping-form-lname">Payment method:</label>
                                <select id="poption" name="poption" class="sm-form-control">
                                    <option value="COD">Cash on Delivery</option>
                                    <option disabled="disabled" value="CC" value="PP">Paypal</option>
                                    <option disabled="disabled" value="CC">Credit Card</option>
                                </select>
                            </div>

                        <hr>
                        <div class="col_full">
                            <a href="#" id="ppay" style="float:left!important;display:none;" class="button button-3d fright">Pay Now</a>
                        </div>

                    </div>
                    <div class="clear bottommargin"></div>
                    <div class="col-md-6">
                        <div class="table-responsive clearfix">
                            <h4>Your Orders</h4>

                            <table class="table cart">
                                <thead>
                                    <tr>
                                        <th class="cart-product-thumbnail">&nbsp;</th>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-quantity">Quantity</th>
                                        <th class="cart-product-subtotal">Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cartItems">

                                @php
                                    $totalpriceNoDisc = 0;
                                @endphp



                                @foreach($cartProducts as $product)



                                <tr class="cart_item">

                                    <td class="cart-product-thumbnail">
                                        <a href="/product/{{$product->id}}"><img width="64" height="64" src="{{$product->image}}" alt="{{$product->name}}"></a>
                                    </td>

                                    <td style="display:none" id="disc">
                                        <span class="amount" id="price{{$product->prodD_id}}" value="{{$product->price}}">£{{$product->price}}</span>
                                    </td>

                                    <td class="cart-product-name">
                                        <a href="/product/{{$product->id}}">{{$product->name}}</a>
                                    </td>

                                    @php
                                        $cartIems = $cart->items[$product->prodD_id];
                                        $totalpriceNoDisc = $totalpriceNoDisc + ($product->price*$cartIems['qty']);

                                    @endphp

                                    <td class="cart-product-quantity">
                                        <a>{{$cartIems['qty']}}</a>
                                    </td>


                                    <td class="cart-product-subtotal">
                                        <span class="amount" id="total{{$product->prodD_id}}">{{$cartIems['price']}}</span>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                            {{--<div class="col-md-8 col-xs-7 nopadding">
                                <input type="text" id="ApplyCouponVal" value="" class="sm-form-control" placeholder="Enter Coupon Code.." />
                            </div>
                            <div class="col-md-4 col-xs-5">
                                {{ csrf_field() }}
                                <a href="#" class="button button-3d button-black nomargin" id="ApplyCoupon">Apply Coupon</a>
                            </div>--}}

                    </div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <h4>Cart Totals</h4>

                            <table class="table cart">
                                <tbody>
                                    <tr class="cart_item">
                                        <td class="notopborder cart-product-name">
                                            <strong>Cart Subtotal</strong>
                                        </td>

                                        <td class="notopborder cart-product-name">
                                            @if($totalDiscount <> 0)
                                                <del class="pprice" id="pprice"><strong id="ftotal">£{{$totalpriceNoDisc}}</strong></del>
                                                <ins>
                                                    <span class="amount color lead"><strong id="ftotal">£{{$totalPrice}}</strong></span>
                                                </ins>
                                            @endif

                                            @if($totalDiscount == 0)

                                                    <span class="pprice" id="pprice"><strong id="ftotal">{{$totalPrice}}</strong></span>

                                            @endif
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Shipping</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <span class="ShippingAmount" id="ShippingAmount">{{$shippingPrice}}</span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                            <td class="cart-product-name">
                                                <strong>Discount</strong>
                                            </td>
        
                                            <td class="cart-product-name">
                                                <span style="color: red;font-weight: bolder;" class="amount"><b id="sdiscount">-£{{$totalpriceNoDisc-$totalPrice}}</b></span>
                                            </td>
                                        </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Coupon Discount</strong>
                                        </td>
    
                                        <td class="cart-product-name">
                                            <span style="color: red;font-weight: bolder;" class="amount"><b id="cdiscount">-£{{$cart->tcoupondiscount}}</b></span>
                                        </td>
                                    </tr>
                                    <tr class="cart_item">
                                        <td class="cart-product-name">
                                            <strong>Total</strong>
                                        </td>

                                        <td class="cart-product-name">
                                            <input type="hidden" id="totalcost" name="totalcost" value="{{$totalPrice}}" class="sm-form-control">
                                            <span class="amount color lead"><strong id="ftotalall">£{{$totalPrice+$shippingPrice}}</strong></span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>

                        </div>

                        <button id="plOrder" class="button button-3d fright">Place Order</button>

                    </div>
                    </form>
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
        $('#ftotalall').html(TotalPrice+StateSh);
        $('#totalcost').val(TotalPrice+StateSh);
    });


    $("#ApplyCoupon").click(function () {


        var Coupon =document.getElementById("ApplyCouponVal").value;


        var $data = {};

        var _token = $("input[name='_token']").val();
        $data._token=_token;
        $data.Coupon = Coupon;




        $.ajax({
            type: "post",
            url: '{{URL::route('Cart.copoun') }}',
            data: $data ,
            success: function (data) {
                swal("Product added to WishList");
                console.log(data);
                },
            error: function () {
                swal('Product added before in WishList');
                }
        });
        return false;

    });



</script>

<style>
    input:invalid {
        box-shadow: 0 0 5px 1px red;
    }

    input:focus:invalid {
        outline: none;
    }
</style>




@endsection