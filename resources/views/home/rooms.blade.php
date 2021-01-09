
@extends('layouts.base')
@section('title',$hotel->title.'-Rooms')
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{$hotel->title}} Rooms</h2>
                    <a href="{{route('home')}}">{{$setting->title}}</a> > <a>{{$hotel->title}}</a> > <a>Rooms</a>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

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

@endsection
