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
                @if(count($rooms) > 0 )
                @foreach($rooms as $rs)
                <p>{{$rs -> id}}</p>
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
