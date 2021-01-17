@extends('home.user._base')
@section('title','MY PROFILE')
@section('big_title')
    USER PROFILE
@endsection
@section('path')
    <a style="color: white">PROFILE</a>
@endsection
@section('content_user')

    @include('profile.show')

@endsection
