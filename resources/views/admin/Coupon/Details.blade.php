<div class="card">


    <div class="card-body">
        <h5 class="card-title">Order Items</h5>


        <div class="table-responsive">
            <table id="zero_config2" class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Coupon</th>
                    <th>Order</th>
                    <th>Product</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Serial Number</th>

                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                        <td>{{$product->coupon}}</td>
                        <td><a href="/admin/Orders/View/{{$product->order_id}}" id="edit_popup" class="btn btn-template-outlined btn-sm edit_popup"><span>#{{$product->order_id}}</span></a></td>
                        <td><img width="64" height="64" src="{{asset($product->image)}}" alt="{{$product->name}}"></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}}</td>
                        <td>{{$product->quantity}}</td>
                        <td><input type="button" name="colorBu" id="colorBut{{$product->color}}" style="background-color: {{$product->color}};opacity: .6" class="plus scolor" disabled></td>
                        <td>{{$product->size}}</td>
                        <td>{{$product->serial_no}}</td>
                    </tr>
                @endforeach


                </tbody>

            </table>
        </div>

    </div>
</div>