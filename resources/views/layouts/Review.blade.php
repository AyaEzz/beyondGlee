@extends('layouts.app')

@section('content')

<section>

    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif

        <form class="nobottommargin" id="reviewform" method="post" action="{{route('Product.Review')}}">

                    <div class="modal-header">
                         <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review</h4>
                    </div>



        <table class="table cart">

    @foreach($cartItems as $item)

                <tr>
                    <td>


                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="reviewFormModalLabel">Submit a Review For {{$item['name']}}</h4>

                    </td>

                    <td>

                        <a href=""><img width="64" height="64" src="{{$item['image']}}" alt="{{$item['name']}}"></a>
                    </td>


                    <td>

                        <div class="col_full col_last">
                            <label for="template-reviewform-rating">Rating</label>
                            <select id="reviewrating{{$item['pord_id']}}" name="reviewrating{{$item['pord_id']}}" class="form-control">
                                <option value="">-- Select One --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>

</td>

                       <td>

                        <div class="col_full">
                            <label for="template-reviewform-comment">Comment <small>*</small></label>
                            <textarea class="required form-control" id="reviewcomment{{$item['pord_id']}}" name="reviewcomment{{$item['pord_id']}}" rows="2" cols="30"></textarea>
                        </div>

                       </td>






                </tr>

    @endforeach

        </table>







            <div class="clear bottommargin"></div>

            <div class="col_full nobottommargin" style="width:30%; margin:0 auto;">
                {{ csrf_field() }}
                <input type="hidden" id="prod_id" value="{{$item['pord_id']}}">
                <button class="button button-3d nomargin" type="submit" id="reviewform-submit"  data-token="{{ csrf_token() }}" >Submit Review</button>
                <button class="button button-3d nomargin"  id="reviewform-Skip"  onclick="{{url('/skipreview')}}" >Skip Review</button>

            </div>

            <div class="clear bottommargin"></div>





        </form>
</section>


@endsection


