@php
    $front_setting=\App\Http\Controllers\HomeController::getFrontSetting();
@endphp
@extends('layouts.base')
@section('title',$setting->title.'-FAQ')
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner " style="background-image:url('{{Storage::url($front_setting->slider_img1)}}')">
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

            <div class="shortcode-heading-list">


                <div class="row">

                    <div class="col-md-12">
                        <h2 style="color: #d0a965"><span style="font-weight:bold">{{$setting->title}} Frequently asked questions</span></h2>
                        <br>
                        @foreach($faqs as $rs)
                            <div>
                                <a class="accordion2" ><h5 ><button style="background-color: transparent; background-repeat: no-repeat;border: none;cursor: pointer;overflow: hidden;outline: none"><span style="color: #8a6d3b;font-size: 20px">+ </span>{{$rs -> question}}</button></h5></a>
                            <div style=" @if($rs->position != 1)display: none; @endif background-color: white;padding-left: 50px">
                                <p><span style="font-size:19px;">{{$rs -> answer}}</span></p>
                            </div>
                            </div>
                        @endforeach
                        <script>
                            var acc = document.getElementsByClassName("accordion2");
                            var i;

                            for (i = 0; i < acc.length; i++) {
                                acc[i].addEventListener("click", function () {
                                    this.classList.toggle("active");
                                    var panel = this.nextElementSibling;
                                    if (panel.style.display === "block") {
                                        panel.style.display = "none";
                                    } else {
                                        panel.style.display = "block";
                                    }
                                });
                            }
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection


