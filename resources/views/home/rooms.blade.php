
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
                        <span class="price">{{$hotel->star}} <span class="amout">star</span></span>
                        <span class="price">Start form <span class="amout">$120</span> per day</span>
                        <span class="price">Phone: <span class="amout">{{$hotel->phone}}</span> </span>
                        <span class="price">Address: <span class="amout">{{$hotel->address}}</span> </span>
                        <p>{!!$hotel->details!!}</p>

                    </div>
                </div>
                <!-- ITEM -->
            </div>
        </div>
    </section>

                <!-- ROOM -->
    <section class="section-room bg-white">
        <div class="container">

            <div class="room-wrap-1">
                <div class="row">
                    <div class="room_item-2 text-center" >
                        <div class="text" >
                            <h2>ROOMS</h2>
                            <hr style="border-width:2px;color:#8a6d3b">
                        </div>
                    </div>

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

@endsection
