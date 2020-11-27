<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- TITLE -->
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <meta name="keywords" content="@yield('keywords')">
    <meta name="author" content="Saleh Khaled">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" href="{{asset('assets')}}/images/favicon.png"/>

    <!-- GOOGLE FONT -->
    <link href='http://fonts.googleapis.com/css?family=Hind:400,300,500,600%7cMontserrat:400,700' rel='stylesheet'
          type='text/css'>

    <!-- CSS LIBRARY -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/font-lotusicon.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/settings.css">
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/lib/bootstrap-select.min.css">
    @yield('css')

    <!-- MAIN STYLE -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets')}}/css/style.css">

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    @yield('headerJs')
    <![endif]-->
</head>

<!--[if IE 7]>
<body class="ie7 lt-ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 8]>
<body class="ie8 lt-ie9 lt-ie10"> <![endif]-->
<!--[if IE 9]>
<body class="ie9 lt-ie10"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body> <!--<![endif]-->

<!-- PRELOADER -->
<div id="preloader">
    <span class="preloader-dot"></span>
</div>
<!-- END / PRELOADER -->

<!-- PAGE WRAP -->
<div id="page-wrap">

    @include("home._header")
    @section('content')
        <!-- body content here -->
    @show
    @include("home._footer")


</div>
<!-- END / PAGE WRAP -->

<!-- LOAD JQUERY -->
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery-ui.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/bootstrap-select.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&amp;signed_in=true"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/isotope.pkgd.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/owl.carousel.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.appear.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.countTo.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.countdown.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.parallax-1.1.3.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/SmoothScroll.js"></script>
<!-- validate -->
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.form.min.js"></script>
<script type="text/javascript" src="{{asset('assets')}}/js/lib/jquery.validate.min.js"></script>
@yield('footerJs')
<!-- Custom jQuery -->
<script type="text/javascript" src="{{asset('assets')}}/js/scripts.js"></script>
</body>
</html>
