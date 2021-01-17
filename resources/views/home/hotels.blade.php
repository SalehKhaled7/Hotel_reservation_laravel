@php
    $front_setting=\App\Http\Controllers\HomeController::getFrontSetting();
@endphp
@extends('layouts.base')
@section('title',$setting->title.'-Hotels')
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner " style="background-image:url('{{Storage::url($front_setting->slider_img1)}}')">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>{{$setting->title}} Hotels</h2>
                    <a href="{{route('home')}}">{{$setting->title}}</a> > <a>Hotels</a>
                </div>
            </div>

        </div>
    </section>
    <!-- END / SUB BANNER -->

    <!-- ROOM -->
    <section class="section-room bg-white">
        <div class="container">
            <div class="room-wrap-6">
                <!-- ITEM -->
                @if(count($hotel_list) > 0 )
                @foreach($hotel_list as $rs)
                <div class="room_item-6" data-background="{{asset('assets')}}/images/hotels/{{$rs->image}}">

                    <div class="text">
                        <h2><a href="#">{{$rs->title}}</a></h2>
                        <span class="price">Start form <span class="amout">$120</span> per day</span>
                        <p>{{$rs->details}}</p>
                        <ul>
                            <li>{{$rs->star}} Star</li>
                            <li>{{$rs->city}}</li>
                            <li>{{$rs->phone}}</li>
                            <li>. . . . </li>
                        </ul>
                        <a href="{{route('room_list',['id'=>$rs->id])}}" class="awe-btn awe-btn-13">VIEW DETAILS</a>
                    </div>

                </div>
                <!-- END / ITEM -->
                @endforeach
                @else
                    <div style="height: 100px"></div>
                    <div class="text-center ">
                        <h3 style=""> NO MATCH FOUND ...</h3>
                    </div>
                    <div style="height: 20px"></div>

                @endif

            </div>

        </div>
    </section>
    <!-- END / ROOM -->

@endsection
