@extends('layouts.app')

@section('content')
    <!-- Content
		============================================= -->
    <section id="content">

        <div class="content-wrap">

            <div class="container clearfix">

                <div class="row clearfix">

                    <div class="col-sm-9">

                        <img src="{{asset('images/icons/avatar.jpg')}}" class="alignleft img-circle img-thumbnail notopmargin nobottommargin maxhgt84" alt="Avatar" >

                        <div class="heading-block noborder">
                            <h3>{{$user->name}}</h3>
                            <span>{{$user->title}}</span>
                        </div>

                        <div class="clear"></div>

                        <div class="row clearfix">

                            <div class="col-md-12">

                                <div class="tabs tabs-alt clearfix" id="tabs-profile">

                                    <ul class="tab-nav clearfix">
                                        <li><a href="#tab-activites"><i class="icon-rss2"></i> Activites</a></li>
                                        <li><a href="#tab-orders"><i class="icon-pencil2"></i> Orders</a></li>
                                        <li><a href="#tab-reviews"><i class="icon-reply"></i> Reviews</a></li>
                                    </ul>

                                    <div class="tab-container">

                                        <div class="tab-content clearfix" id="tab-activites">

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped">
                                                    <colgroup>
                                                        <col class="col-xs-1">
                                                        <col class="col-xs-7">
                                                    </colgroup>
                                                    <thead>
                                                    <tr>
                                                        <th>Time</th>
                                                        <th>Activity</th>

                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($activites as $activity)
                                                    <tr>
                                                        <td>
                                                            <code>{{$activity->created_at}}</code>
                                                        </td>
                                                        <td>{{$activity->action}}</td>

                                                    </tr>
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-orders">

                                            <div id="customer-orders" class="col-md-9">
                                                <div class="box mt-0 mb-lg-0">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <thead>
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Total</th>
                                                                <th>Status</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @foreach($orders as $order)
                                                            <tr>
                                                                <th>#{{$order->id}}</th>
                                                                <td>{{$order->created_at}}</td>
                                                                <td>{{$order->total_cost}}</td>
                                                                <td><span class="badge badge-info">{{$order->status}}</span></td>
                                                                <td><a href="/user/{{Auth::user()->name}}/order/{{$order->id}}" class="btn btn-template-outlined btn-sm">View</a></td>
                                                            </tr>
                                                            @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="tab-content clearfix" id="tab-reviews">

                                            <div class="clear topmargin-sm"></div>
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
                                                            <img alt="" src="{{asset($review->prodImg)}}" height="60" width="60"></span>
                                                                            </div>
                                                                        </div>

                                                                        <div class="comment-content clearfix">
                                                                            <a href="/product/{{$review->prod_id}}"><div class="comment-author">{{$review->prodName}}
                                                                                <span>{{$review->created_at}}</span>
                                                                                </div></a>
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


                                                </div>

                                            </div>


                                        </div>


                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="line visible-xs-block"></div>

                    <div class="col-sm-3 clearfix">

                        <a href="/editprofile" class="button button-rounded button-reveal button-large button-teal" data-lightbox="ajax"><i class="far fa-edit"></i><span>Edit Profile</span></a>



                        <div class="fancy-title topmargin title-border">
                            <h4>Social Profiles</h4>
                        </div>

                        <a href="#" class="social-icon si-facebook si-small si-rounded si-light" title="Facebook">
                            <i class="icon-facebook"></i>
                            <i class="icon-facebook"></i>
                        </a>

                        <a href="#" class="social-icon si-gplus si-small si-rounded si-light" title="Google+">
                            <i class="icon-gplus"></i>
                            <i class="icon-gplus"></i>
                        </a>

                        <a href="#" class="social-icon si-dribbble si-small si-rounded si-light" title="Dribbble">
                            <i class="icon-dribbble"></i>
                            <i class="icon-dribbble"></i>
                        </a>

                        <a href="#" class="social-icon si-flickr si-small si-rounded si-light" title="Flickr">
                            <i class="icon-flickr"></i>
                            <i class="icon-flickr"></i>
                        </a>

                        <a href="#" class="social-icon si-linkedin si-small si-rounded si-light" title="LinkedIn">
                            <i class="icon-linkedin"></i>
                            <i class="icon-linkedin"></i>
                        </a>

                        <a href="#" class="social-icon si-twitter si-small si-rounded si-light" title="Twitter">
                            <i class="icon-twitter"></i>
                            <i class="icon-twitter"></i>
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </section><!-- #content end -->

@endsection
