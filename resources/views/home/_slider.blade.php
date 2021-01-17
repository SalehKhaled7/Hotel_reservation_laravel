@php
    $setting=\App\Http\Controllers\HomeController::getSetting();
    $front_setting=\App\Http\Controllers\HomeController::getFrontSetting();
@endphp
<!-- BANNER SLIDER -->
<section class="section-slider">
    <h1 class="element-invisible">Slider</h1>
    <div id="slider-revolution">
        <ul>
            <li data-transition="fade">
                <img src="{{Storage::url($front_setting->slider_img1)}}" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="100" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    <img src="{{asset('assets')}}/images/slider/hom1-slide1.png" alt="icons">
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-1" data-x="center" data-y="240" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    WELCOME TO
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-sub-1" data-x="center" data-y="280" data-speed="700" data-easing="easeOutBack"  data-start="2000">THE LOTUS BOOKING</div>
                <div class="tp-caption sfb fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="395" data-easing="easeOutBack" data-speed="700" data-start="2400"><img src="{{asset('assets')}}/images/icon-slider-2.png" alt=""></div>

            </li>
            @foreach($hotels_slider as $rs)
            <li data-transition="fade">
                <img src="{{asset('assets')}}/images/hotels/{{$rs->image}}" data-bgposition="left center" data-duration="14000" data-bgpositionend="right center" alt="">

                <div class="tp-caption sft fadeout" data-x="center" data-y="195" data-speed="700" data-start="1300" data-easing="easeOutBack">
                    <img src="{{asset('assets')}}/images/icon-slider-1.png" alt="">
                </div>

                <div class="tp-caption sft fadeout slider-caption-sub slider-caption-sub-3" data-x="center" data-y="220" data-speed="700" data-start="1500" data-easing="easeOutBack">
                    {{$rs->star}} STAR
                </div>

                <div class="tp-caption sfb fadeout slider-caption slider-caption-3" data-x="center" data-y="260" data-speed="700" data-easing="easeOutBack"  data-start="2000">

                    {{$rs->title}}
                </div>
>
                <a href="{{route('room_list',['id'=>$rs->id])}}" class="tp-caption sfb fadeout awe-btn awe-btn-12 awe-btn-slider" data-x="center" data-y="380" data-easing="easeOutBack" data-speed="700" data-start="2200">VIEW DETAILS</a>


            </li>
                @endforeach


        </ul>
    </div>

</section>
<!-- END / BANNER SLIDER -->

