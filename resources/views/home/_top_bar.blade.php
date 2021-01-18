@php
$setting = \App\Http\Controllers\HomeController::getSetting();
@endphp
<!-- HEADER TOP -->
<div class="header_top">
    <div class="container">
        <div class="header_left float-left">
            <span><i class="lotus-icon-cloud"></i> 18 °C</span>
            <span><i class="lotus-icon-location"></i> 225 Beach Street, Australian</span>
            <span><i class="lotus-icon-phone"></i> {{$setting -> phone}}</span>
        </div>
        <div class="header_right float-right">
        @if(Auth::check())
                <div class="dropdown currency">
                    <span>{{Auth::user()->name}} <i class="fa fa"></i></span>
                    <ul>
                        <li><a href="{{route('profile')}}">profile</a></li>
                        <li><a href="{{route('user_logout')}}">logout</a></li>
                    </ul>
                </div>
        @else
                <span class="login-register">
                            <a href="{{route('user_login')}}">Login</a>
                            <a href="{{route('user_register')}}">register</a>
                        </span>
        @endif



        </div>
    </div>
</div>
<!-- END / HEADER TOP -->
