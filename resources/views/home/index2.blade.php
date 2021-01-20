@php
    $setting=\App\Http\Controllers\HomeController::getSetting();
    $front_setting=\App\Http\Controllers\HomeController::getFrontSetting();
@endphp
@extends('layouts.base')
@section('title',$setting->title)
@section('description',$setting->description)
@section('keywords',$setting->keywords)
@section('CSS')
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/hotel_picker/css/hotel-datepicker.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/hotel_picker/css/main.css">
@endsection
@section('content')
    @include('home._slider')

    <div class="page">



        <div class="demo">

            <input type="text" id="demo3" value="">


        </div>

    </div>

    <script type="text/javascript" src="{{asset('assets')}}/hotel_picker/js/fecha.min.js"></script>
    <script type="text/javascript" src="{{asset('assets')}}/hotel_picker/js/hotel-datepicker.min.js"></script>

    <script type="text/javascript">
        (function() {
            // ------------------- DEMO 1 ------------------- //


            var demo3 = new HotelDatepicker(document.getElementById('demo3'), {
                format: 'DD-MM-YYYY',
                disabledDates: [
                    '2021-01-27',
                    '2021-01-23',
                    '2021-01-26',
                    '2021-01-28',
                    '2021-01-31',
                    '2021-02-10'
                ]
            });


        })();
    </script>

@endsection


