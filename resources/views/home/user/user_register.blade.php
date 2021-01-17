@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
@extends('layouts.base')
@section('title')
{{$setting->title}}-login
@endsection
@section('description',' ')
@section('keywords',' ')
@section('content')




    <!-- ACCOUNT -->
    <section class="section-account parallax " style="background-image:url('{{asset('assets')}}/images/evening-hotel-palm-trees-dubai-uae.jpg')">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>REGISTER FORM</h2>
                    <p>If you no have account in lotus Booking! Register and feeling</p>
                    <form action="{{route('user_register_create')}}" class="account_form" method="post">
                        @csrf
                        <div class="field-form">
                            <input type="text" class="field-text" name="name" placeholder="User name*">
                        </div>
                        <div class="field-form">
                            <input type="text" class="field-text" name="email" placeholder="Email*">
                        </div>
                        <div class="field-form">
                            <input type="password" class="field-text" name="password" placeholder="Password*">
                            <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        </div>
                        <div class="field-form field-submit">
                            <button class="awe-btn awe-btn-13">REGISTER</button>
                        </div>
                        <span class="account-desc">Already have an account ?  -  <a href="{{ route('user_login') }}">Login</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ACCOUNT -->






@endsection
