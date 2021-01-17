@php
    $setting=\App\Http\Controllers\HomeController::getSetting();
    $front_setting=\App\Http\Controllers\HomeController::getFrontSetting();
@endphp
@extends('layouts.base')
@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    @include('home._slider')
    <!-- CHECK AVAILABILITY -->
    <section class="section-check-availability">
        <div class="container">
            <div class="check-availability">
                <div class="row">
                    <div class="col-lg-3">
                        <h2>CHECK AVAILABILITY</h2>
                    </div>
                    <div class="col-lg-9">
                        <form  action="{{route('find_hotel')}}" method="post">
                            @csrf
                            <div class="availability-form">
                                <select class="awe-select" name="city">
                                    <option>City</option>
                                    @foreach($cities as $rs)
                                    <option value="{{$rs->city}}">{{$rs->city}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="check_in" class="awe-calendar from" placeholder="Check in">
                                <input type="text" name="check_out" class="awe-calendar to" placeholder="Check out">

                                <select class="awe-select" name="people">
                                    <option>Beds</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                </select>
                                <div class="vailability-submit">
                                    <button type="submit" class="awe-btn awe-btn-13">FIND</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / CHECK AVAILABILITY -->

    <!-- ACCOMD ODATIONS -->
    <section class="section-accomd awe-parallax " style="background-image:url('{{Storage::url($front_setting->index_hotel_bg)}}')">
        <div class="container">
            <div class="accomd-modations">
                <div class="row">
                    <div class="col-md-12">
                        <div class="accomd-modations-header">
                            <h2 class="heading">HOTELS & RATES</h2>
                            <img src="{{asset('assets')}}/images/icon-accmod.png" alt="icon">
                            <p>Semper ac dolor vitae accumsan. Cras interdum hendrerit lacinia. Phasellus accumsan urna vitae molestie interdum. Nam sed placerat libero, non eleifend dolor.</p>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="accomd-modations-content owl-single">

                            <div class="row">
                            @foreach($hotel_list as $rs)
                                <!-- ITEM -->
                                <div class="col-xs-4">
                                    <div class="accomd-modations-room">
                                        <div class="img">
                                            <a href="{{route('room_list',['id'=>$rs->id])}}"><img src="{{asset('assets')}}/images/hotels/{{$rs->image}}" alt=""></a>
                                        </div>
                                        <div class="text">
                                            <h2><a href="{{route('room_list',['id'=>$rs->id])}}">{{$rs-> title }}</a></h2>
                                            <p class="price">
                                                <span class="amout">{{$rs->star}}</span> Star
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- END / ITEM -->
                                @endforeach

                            </div>

                            <div class="row">

                                <!-- ITEM -->
                                @foreach($hotel_list2 as $rs2)
                                <div class="col-xs-4">
                                    <div class="accomd-modations-room">
                                        <div class="img">
                                            <a href="{{route('room_list',['id'=>$rs2->id])}}"><img src="{{asset('assets')}}/images/hotels/{{$rs2->image}}" alt=""></a>
                                        </div>
                                        <div class="text">
                                            <h2><a href="{{route('room_list',['id'=>$rs2->id])}}">{{$rs2-> title }}</a></h2>
                                            <p class="price">
                                                <span class="amout">{{$rs2->star}}</span> Star
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <!-- END / ITEM -->

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- END / ACCOMD ODATIONS -->

    <!-- ABOUT -->
    <section class="section-home-about bg-white">
        <div class="container">
            <div class="home-about">
                <div class="row">
                    <div class="col-md-6">
                        <div class="img">
                            <a href="#"><img src="{{Storage::url($front_setting->index_about_us_img)}}" alt=""></a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text">
                            <h2 class="heading">ABOUT US</h2>
                            <span class="box-border"></span>
                            <p>{{$front_setting->index_about_us}}</p>
                            <a href="{{route('about_us')}}" class="awe-btn awe-btn-default">READ MORE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ABOUT -->

    <!-- OUR BEST -->
    <section class="section-our-best bg-white">
        <div class="container">


        </div>
    </section>
    <!-- END / OUR BEST -->

    <!-- HOME GUEST BOOK -->
    <div class="section-home-guestbook awe-parallax " style="background-image:url('{{Storage::url($front_setting->index_review_bg)}}')">
        <div class="container">
            <div class="home-guestbook">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="guestbook-content owl-single">
                            @foreach($home_reviews as $rs)
                            <!-- ITEM -->
                            <div class="guestbook-item">
                                <div class="text">
                                    <div><p>{{$rs->review}}</p></div>

                                    <span><strong>{{$rs->user->name}}</strong></span><br>
                                    <span>review on {{$rs->hotel->title}} hotel</span>
                                </div>
                            </div>
                            <!-- ITEM -->
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    <!-- END / HOME GUEST BOOK -->



    <!-- GALLERY -->
    <section class="section-gallery bg-white">

        <div class="gallery  no-padding">




            </div>
            <!-- GALLERY CONTENT -->

        </div>
    </section>
    <!-- END / GALLERY -->

@endsection


