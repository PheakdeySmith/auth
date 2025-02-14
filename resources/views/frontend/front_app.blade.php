<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- meta data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i"
        rel="stylesheet">

    <!-- title of site -->
    <title>eOcambo</title>

    <!-- For favicon png -->
    <link rel="shortcut icon" type="image/icon" href="{{ asset('front_assets') }}/logo/favicon.png" />

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/font-awesome.min.css">

    <!--linear icon css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/linearicons.css">

    <!--animate.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/animate.css">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/owl.theme.default.min.css">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/bootstrap.min.css">

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/bootsnav.css">

    <!--style.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/style.css">

    <!--responsive.css-->
    <link rel="stylesheet" href="{{ asset('front_assets') }}/css/responsive.css">



</head>

<body>


    <!--welcome-hero start -->
    <header id="home" class="welcome-hero">

        {{-- start carousel --}}
        @include('frontend.partials.carousel')
        {{-- end carousel --}}

        {{-- start top-area --}}
        @include('frontend.partials.top_area')
        {{-- end top-area --}}

    </header>

    <div class="page-content">
        @yield('content')
    </div>

    <!-- footer start-->
    <footer id="footer" class="footer">
        @include('frontend.partials.footer')
    </footer>
    <!-- footer end-->


    <!-- Include all js compiled plugins (below), or include individual files as needed -->

    <script src="{{ asset('front_assets') }}/js/jquery.js"></script>

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

    <!--bootstrap.min.js-->
    <script src="{{ asset('front_assets') }}/js/bootstrap.min.js"></script>

    <!-- bootsnav js -->
    <script src="{{ asset('front_assets') }}/js/bootsnav.js"></script>

    <!--owl.carousel.js-->
    <script src="{{ asset('front_assets') }}/js/owl.carousel.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>


    <!--Custom JS-->
    <script src="{{ asset('front_assets') }}/js/custom.js"></script>

</body>

</html>
