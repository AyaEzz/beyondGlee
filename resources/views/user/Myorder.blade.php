@extends('layouts.app')


@section('content')

<section>
<div id="heading-breadcrumbs">
    <div class="container">
        <div class="row d-flex align-items-center flex-wrap">
            <div class="col-full">
                <h1 class="h2">Order # {{$orderid}}</h1>
            </div>

        </div>
    </div>
</div>
    @php

    $items = $allitems->items;

    @endphp

<div id="content">
    <div class="container">
        <div class="row bar">
            <div id="customer-order" class="col-full">
                <p class="lead">Order #{{$orderid}} was placed on <strong>{{$orderTime}}</strong> and is currently <strong>{{$orderstatus}}</strong>.</p>
                <div class="box">
                    <div CLASS="col_half">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th colspan="2" class="border-top-0">Product</th>
                                <th class="border-top-0">Quantity</th>
                                <th class="border-top-0">Unit price</th>
                                <th class="border-top-0">Discount</th>
                                <th class="border-top-0">Part Number</th>
                                <th class="border-top-0">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orderItems as $orderItem)
                            <tr>
                                @php
                                $item = $items[$orderItem->pro_details_id];
                                @endphp
                                <td><a href="/product/{{$orderItem->prod_id}}"><img width="64" height="64" src="{{asset($item['item']->image)}}" alt="{{$item['item']->name}}" class="img-fluid"></a></td>
                                <td><a href="/product/{{$orderItem->prod_id}}">{{$item['item']->name}}</a></td>
                                <td>{{$orderItem->quantity}}</td>
                                <td>${{$item['item']->price}}</td>
                                @if($item['item']->sale == 1)
                                <td>${{($item['item']->price*($item['item']->discount/100))*$orderItem->quantity}}</td>
                                @else
                                    <td>$0.00</td>
                                @endif
                                <td>{{$orderItem->serial_no}}</td>serial_no
                                @if($item['item']->sale == 1)
                                <td>${{($item['item']->price-($item['item']->price*($item['item']->discount/100)))*$orderItem->quantity}}</td>
                                @else
                                <td>${{$item['item']->price*$orderItem->quantity}}</td>
                                @endif
                            </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th colspan="5" class="text-right">Order subtotal</th>
                                <th>${{$allitems->totalPrice}}</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Shipping and handling</th>
                                <th>${{explode('_',$shippingDetails->state)[0]}}</th>
                            </tr>
                            <tr>
                                <th colspan="5" class="text-right">Total</th>
                                <th>${{$orderItems[0]->total_cost}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    </div>
                    <div class="col_half col_last">
                    <div class="row addresses">

                        <div class="col-md-6 text-right">
                            <h3 class="text-uppercase">Shipping address</h3>
                            <p>{{$shippingDetails->name}}<br>					    {{$shippingDetails->address}}<br>					    {{$shippingDetails->city}}<br>					    {{explode('_',$shippingDetails->state)[1]}}<br>					    {{$shippingDetails->country}}</p>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

@endsection