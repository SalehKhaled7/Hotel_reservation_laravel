@extends('home.user._base')
@section('title_user','profile')
@section('path')
    <a>Profile</a>
@endsection
@section('content_user')

    @include('profile.show')

@endsection
