@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
@extends('layouts.base')
@section('title',$setting->title.'-contact')
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('content')
    <!-- SUB BANNER -->
    <section class="section-sub-banner bg-9">
        <div class="awe-overlay"></div>
        <div class="sub-banner">
            <div class="container">
                <div class="text text-center">
                    <h2>Contact {{$setting->title}}</h2>
                   <a href="{{route('home')}}">{{$setting->title}}</a> > <a>Contact</a>

                </div>
            </div>

        </div>

    </section>
    <!-- END / SUB BANNER -->
    <!-- CONTACT -->
    <section class="section-contact">
        <div class="container">
            <div class="contact">
                <div class="row">

                    <div  class="col-md-6 col-lg-5">
                        {!! $setting->contact !!}
                    </div>
                    <div class="col-md-6 col-lg-6 col-lg-offset-1">
                        <div class="contact-form">
                            <form id="send-contact-form" action="send_mail_contact.php" method="post">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text"  name="name" placeholder="Name">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="field-text" name="email" placeholder="Email">
                                    </div>
                                    <div class="col-sm-12">
                                        <input type="text" class="field-text" name="subject" placeholder="Subject">
                                    </div>
                                    <div class="col-sm-12">
                                        <textarea cols="30" rows="10" name="message"  class="field-textarea" placeholder="Write what do you want"></textarea>
                                    </div>
                                    <div class="col-sm-6">
                                        <button type="submit" class="awe-btn awe-btn-13">SEND</button>
                                    </div>
                                </div>
                                <div id="contact-content"></div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- END / CONTACT -->

@endsection


