
@extends('layouts.base')
@section('title',$setting->title.'-FAQ')
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>FAQ</h2>
                    <a href="{{route('home')}}">{{$setting->title}}</a> > <a>FAQ</a>
                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->

    <!-- ABOUT -->
    <section class="section-about">
        <div class="container">

            {!! $setting->faq !!}
        </div>
    </section>

@endsection


