<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <title>eOshop</title>

    <link rel="shortcut icon" type="image/icon" href="{{ asset('front_assets') }}/logo/favicon.png" />

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/linearicons.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/animate.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/owl.theme.default.min.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/bootsnav.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/style.css">

    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/responsive.css">
</head>

<body>

    <header id="home" class="welcome-hero">
        @include('frontend.partials.top_area')
    </header>

    <div class="page-content">
        @yield('content')
    </div>

    <footer id="footer" class="footer">
        @include('frontend.partials.footer')
    </footer>

    <script src="{{ asset('front_assets') }}/js/jquery.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <script src="{{ asset('front_assets') }}/js/bootstrap.min.js"></script>

    <script src="{{ asset('front_assets') }}/js/bootsnav.js"></script>

    <script src="{{ asset('front_assets') }}/js/owl.carousel.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <script src="{{ asset('front_assets') }}/js/custom.js"></script>

</body>

</html>
