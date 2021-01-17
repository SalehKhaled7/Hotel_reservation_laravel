
@extends('layouts.base')
@section('title',$hotel->title.'-Rooms')
@section('description',$setting->description)
@section('keywords',$setting->keywords)

@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner " style="background-image:url('{{asset('assets')}}/images/hotels/{{$hotel->image}}')">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{$hotel->title}} HOTEL</h2>
                    <a href="{{route('home')}}">{{$setting->title}}</a> > <a>{{$hotel->title}}</a>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->
    <section class="section-room bg-white">
        <div class="container">

            <div class="room-wrap-2">

                <!-- ITEM -->
                <div class="room_item-2">

                    <div class="img">
                       <img src="{{asset('assets')}}/images/hotels/{{$hotel->image}}" alt="">
                    </div>

                    <div class="text">
                        <h2>{{$hotel->title}} HOTEL</h2>
                        @php
                        $review_avg=\App\Http\Controllers\HomeController::get_review_avg($hotel->id);
                        @endphp

                        <div>
                            <i class="fa fa-star  @if($review_avg >=   1)checked @endif" aria-hidden="true" ></i>
                            <i class="fa fa-star  @if($review_avg >=   2)checked @endif" aria-hidden="true"></i>
                            <i class="fa fa-star  @if($review_avg >=   3)checked @endif" aria-hidden="true"></i>
                            <i class="fa fa-star  @if($review_avg >=   4)checked @endif" aria-hidden="true"></i>
                            <i class="fa fa-star  @if($review_avg >=  5)checked @endif" aria-hidden="true"></i>
                            <span style="color: orange">   {{count($reviews)}} review(s) , rate {{round($review_avg,2)}} </span>

                        </div>


                        <span class="price">{{$hotel->star}}<span class="amout"> star  hotel </span></span>

                        <span class="price">Start form <span class="amout">$120</span> per day</span>
                        <span class="price">Phone: <span class="amout">{{$hotel->phone}}</span> </span>
                        <span class="price">Address: <span class="amout">{{$hotel->address}}</span> </span>
                        <p>{{$hotel->details}}</p>

                    </div>
                </div>
                <!-- ITEM -->
            </div>
        </div>
    </section>


    <!-- RESTAURANTS -->
    <section class="section-restaurant-4 bg-white">
        <div class="container">

            <div class="restaurant-tabs">

                <div class="tabs tabs-restaurant">


                    <ul>
                        <li><a href="#tabs-1">OVERVIEW </a></li>
                        <li><a href="#tabs-2">ROOMS </a></li>
                        <li><a href="#tabs-3">REVIEWS </a></li>
                        <li><a href="#tabs-4">DRINK </a></li>
                    </ul>

                    <div id="tabs-1">

                        <div class="restaurant_content">
                            <div class="row">

                                <!-- ITEM -->
                                <div class="col-md-12">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="room-detail_overview">
                                            <h5 class='text-uppercase'>{{$hotel->title}} HOTEL</h5>
                                            <h5>{{$hotel->star}} <SPAN STYLE="color: #cb9654">STAR</SPAN> / {{$hotel->category()->first()->title}}</h5>
                                            <p>{{$hotel->details}}</p>


                                            <div class="row">
                                                <div class="col-xs-6 col-md-4">
                                                    <h6 style="color:#cb9654 ">Contact</h6>
                                                    <ul>
                                                        <li><b>PHONE: </b>{{$hotel->phone}}</li>
                                                        <li><b>FAX: </b>{{$hotel->fax}}</li>
                                                        <li><b>EMAIL: </b>{{$hotel->email}}</li>

                                                    </ul>
                                                </div>
                                                <div class="col-xs-6 col-md-4">
                                                    <h6 style="color:#cb9654 ">Address</h6>
                                                    <ul>
                                                        <li><b>COUNTRY: </b>{{$hotel->country}}</li>
                                                        <li><b>CITY: </b>{{$hotel->city}}</li>
                                                        <li><b>ADDRESS: </b>{{$hotel->address}}</li>
                                                    </ul>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->


                            </div>

                        </div>

                    </div>

                    <div id="tabs-2">

                        <!-- ROOM -->
                        <section class="section-room bg-white">
                            <div class="container">

                                <div class="room-wrap-1">
                                    <div class="row">

                                        <!-- ITEM -->
                                        @if(count($room_list)>0)

                                            @foreach($room_list as $rs)
                                                <div class="col-md-6">
                                                    <div class="room_item-1">

                                                        <h2><a href="#">{{$rs->type}}</a></h2>

                                                        <div class="img">
                                                            <a href="{{route('room_detail',['hotel_id'=>$hotel->id,'room_id'=>$rs->id])}}"><img src="{{asset('assets')}}/images/rooms/{{$rs->image}}" alt=""></a>
                                                        </div>

                                                        <div class="desc">
                                                            <ul>
                                                                <li>Max: {{$rs->beds}} Person(s)</li>
                                                                <li>Size: 35 m2 / 376 ft2</li>
                                                                <li>View: {{$rs->view}}</li>
                                                                <li>Bed: King-size or twin beds</li>
                                                            </ul>
                                                        </div>

                                                        <div class="bot">
                                                            <span class="price">Starting <span class="amout">{{$rs->price}}$</span> /days</span>
                                                            <a href="{{route('room_detail',['hotel_id'=>$hotel->id,'room_id'=>$rs->id])}}" class="awe-btn awe-btn-13">VIEW DETAILS</a>
                                                        </div>

                                                    </div>
                                                </div>
                                            @endforeach
                                        @else

                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
                                            <div class="text text-center"><h3> No available rooms ..</h3></div>
                                    @endif

                                    <!-- END / ITEM -->

                                    </div>
                                </div>

                            </div>
                        </section>
                        <!-- END / ROOM -->

                    </div>

                    <div id="tabs-3">

                        <div class="restaurant_content">
                            <div class="row">
                                <!-- COMMENT RESPOND -->
                                <div class="comment-respond" style="border-top: none; padding-top: 0;margin-top: 0">



                                    @livewire('review',['id' => $hotel->id])
                                    @livewireScripts

                                </div>
                                <!-- END COMMENT RESPOND -->
                                <!-- COMMENT -->
                                <div id="comments">
                                    <h4 class="comment-title">COMMENT ({{count($reviews)}})</h4>

                                    <ul class="commentlist">
                                        @if(count($reviews)>0)
                                        @foreach($reviews as $rs)
                                        <li>
                                            <div class="comment-body">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <a class="comment-avatar"><img src="images/avatar/img-1.jpg" alt=""></a>
                                                        <h4 class="comment-subject">{{$rs->subject}}</h4>
                                                        <p>{{$rs->review}}</p>

                                                    </div>
                                                    <div class="col-sm-6">
                                                        <i class="fa fa-star  @if($rs->rate >=   1)checked @endif" aria-hidden="true" ></i>
                                                        <i class="fa fa-star  @if($rs->rate >=   2)checked @endif" aria-hidden="true"></i>
                                                        <i class="fa fa-star  @if($rs->rate >=   3)checked @endif" aria-hidden="true"></i>
                                                        <i class="fa fa-star  @if($rs->rate >=   4)checked @endif" aria-hidden="true"></i>
                                                        <i class="fa fa-star  @if($rs->rate >=  5)checked @endif" aria-hidden="true"></i>

                                                    </div>
                                                </div>




                                                <span class="comment-meta">
                                                    <a style="font-size: 1em">{{$rs->user->name}}</a> - {{$rs->created_at}}
                                                </span>


                                            </div>
                                        </li>
                                        @endforeach
                                        @else
                                            <li>
                                                <div class="comment-body">

                                                    <h4 class="comment-subject">No comments </h4>

                                                </div>
                                            </li>
                                        @endif

                                    </ul>
                                </div>
                                <!-- END / COMMENT -->

                                <!-- ITEM -->
                                <div class="col-md-7">

                                </div>
                                <!-- END / ITEM -->
                                <!-- ITEM -->
                                <div class="col-md-5">

                                </div>
                                <!-- END / ITEM -->



                            </div>

                        </div>

                    </div>

                    <div id="tabs-4">

                        <div class="restaurant_content">
                            <div class="row">

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                            <span class="sales">-20%</span>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">roast &amp; vegetables</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <ins><span class="amout">$80</span></ins>
                                                <del><span class="amout">$100</span></del>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">MEAT</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">meat soup</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">Pork Skewers Rotation</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">SPAGESTI</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">EGGS</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">Wildberry</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                                <!-- ITEM -->
                                <div class="col-md-6">
                                    <div class="restaurant_item small-thumbs">

                                        <div class="img">
                                            <a href="#"><img src="images/restaurants/img-1.jpg" alt=""></a>
                                        </div>

                                        <div class="text">
                                            <h2><a href="#">Grilled Chicken</a></h2>

                                            <p class="desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry</p>

                                            <p class="price">
                                                <span class="amout">$60</span>
                                            </p>
                                        </div>

                                    </div>
                                </div>
                                <!-- END / ITEM -->

                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END / RESTAURANTS -->


@endsection

