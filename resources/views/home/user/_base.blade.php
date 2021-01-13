@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
@extends('layouts.base')

@section('description',' ')
@section('keywords',' ')
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>@yield('title_user')</h2>
                    <a href="{{route('profile')}}">USER</a> > @section('path') @show
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ABOUT -->
    <section class="section-room-detail bg-white">
        <div class="container">

            <!-- DETAIL -->
            <div class="room-detail">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- TAB -->
                        <div class="room-detail_tab">

                            <div class="row">
                                <div class="col-md-3">
                                    <ul class="room-detail_tab-header">
                                        <li @if(Request::url() === route('profile') ) class="active" @endif ><a href="{{route('profile')}}"  >Profile</a></li>
                                        <li @if(Request::url() === route('user_reviews') ) class="active" @endif ><a href="{{route('user_reviews')}}" >Reviews</a></li>
                                        <li @if(Request::url() === route('user_reservations') ) class="active" @endif ><a href="{{route('user_reservations')}}" >Reservations</a></li>
                                        <li><a href="#package" data-toggle="tab">PACKAGE</a></li>
                                        <li><a href="#rates" data-toggle="tab">RATES</a></li>
                                        <li><a href="#calendar" data-toggle="tab">Calendar</a></li>
                                    </ul>
                                </div>

                                <div class="col-md-9">
                                    <div class="room-detail_tab-content">

                                        @section('content_user')

                                        @show

                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- END / TAB -->


                    </div>
                </div>
            </div>
        </div>
    </section>





@endsection
