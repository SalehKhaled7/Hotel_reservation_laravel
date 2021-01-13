@extends('home.user._base')
@section('title','MY PROFILE')
@section('path')
    <a>Profile</a>
@endsection
@section('content_user')

    @include('profile.show')

@endsection
