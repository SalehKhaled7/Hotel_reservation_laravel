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
    <section class="section-account parallax bg-11">
        <div class="awe-overlay"></div>
        <div class="container">
            <div class="login-register">
                <div class="text text-center">
                    <h2>LOGIN ACCOUNT</h2>
                    <p>Lorem Ipsum is simply dummy text of the printing</p>
                    <form class="account_form" action="{{route('user_loginAuth')}}" method="post" >
                        @csrf
                        <div class="field-form">
                            <input id="email" class="field-text" type="email" name="email" :value="old('email')" required autofocus>
                        </div>
                        <div class="field-form">
                            <input id="password" class="field-text" type="password" name="password" required autocomplete="current-password">
                            <span class="view-pass"><i class="lotus-icon-view"></i></span>
                        </div>
                        <div class="field-form field-submit">
                            <button class="awe-btn awe-btn-13">Login</button>
                        </div>
                        <span class="account-desc">I don’t have an account  -  <a href="{{ route('password.request') }}">Forgot Password</a></span>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- END / ACCOUNT -->






@endsection
