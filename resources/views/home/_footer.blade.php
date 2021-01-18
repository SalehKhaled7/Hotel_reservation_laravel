@php
    $setting=\App\Http\Controllers\HomeController::getSetting()
@endphp
<!-- FOOTER -->
<footer id="footer">

    <!-- FOOTER TOP -->
    <div class="footer_top">
        <div class="container">
            <div class="row">

                <!-- WIDGET MAILCHIMP -->
                <div class="col-lg-9">
                    <div class="mailchimp">
                        <h4>News &amp; Offers</h4>
                        <div class="mailchimp-form">
                            <form action="#" method="POST">
                                <input type="text" name="email" placeholder="Your email address" class="input-text">
                                <button class="awe-btn">SIGN UP</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET MAILCHIMP -->

                <!-- WIDGET SOCIAL -->
                <div class="col-lg-3">
                    <div class="social">
                        <div class="social-content">

                           @if($setting->facebook) <a href="{{$setting->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a>@endif
                            @if($setting->twitter)<a href="{{$setting->twitter}}" target="_blank"><i class="fa fa-twitter"></i></a>@endif
                            @if($setting->linkedin)<a href="{{$setting->linkedin}}" target="_blank"><i class="fa fa-linkedin"></i></a>@endif
                            @if($setting->instagram)<a href="{{$setting->instagram}}" target="_blank"><i class="fa fa-instagram"></i></a>@endif
                        </div>
                    </div>
                </div>
                <!-- END / WIDGET SOCIAL -->

            </div>
        </div>
    </div>
    <!-- END / FOOTER TOP -->

    <!-- FOOTER CENTER -->
    <div class="footer_center">
        <div class="container">
            <div class="row">

                <div class="col-xs-12 col-lg-5">
                    <div class="widget widget_logo">
                        <div class="widget-logo">
                            <div class="img">
                                <a href="/"><img src="{{asset('assets')}}/images/logo-footer.png" alt=""></a>
                            </div>
                            <div class="text">
                                <p><i class="lotus-icon-location"></i> {{$setting->address}}</p>
                                <p><i class="lotus-icon-phone"></i> {{$setting->phone}}</p>
                                <p><i class="fa fa-envelope-o"></i> <a href="mailto:{{$setting->email}}">{{$setting->email}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">Page site</h4>
                        <ul>
                            <li><a href="{{route('references')}}">References</a></li>
                            <li><a href="{{route('contact')}}">Contact</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-2">
                    <div class="widget">
                        <h4 class="widget-title">ABOUT</h4>
                        <ul>
                            <li><a href="{{route('about_us')}}">About Us</a></li>
                            <li><a href="{{route('faq')}}">FAQs</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-xs-4 col-lg-3">
                    <div class="widget widget_tripadvisor">
                        <h4 class="widget-title">Tripadvisor</h4>
                        <div class="tripadvisor">
                            <p>Now with hotel reviews by</p>
                            <img src="{{asset('assets')}}/images/tripadvisor.png" alt="">
                            <span class="tripadvisor-circle">
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i></i>
                                        <i class="part"></i>
                                    </span>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
    <!-- END / FOOTER CENTER -->

    <!-- FOOTER BOTTOM -->
    <div class="footer_bottom">
        <div class="container">
            <p>&copy; 2016 Lotus Hotel All rights reserved.</p>
        </div>
    </div>
    <!-- END / FOOTER BOTTOM -->

</footer>
<!-- END / FOOTER -->
