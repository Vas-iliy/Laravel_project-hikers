<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hikers Blog &mdash; @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('assets/front/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/jquery-ui.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/flaticon/font/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/style.css')}}">
</head>
</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar pt-3" role="banner">
        <div class="container-fluid">
            <div class="row align-items-center">

                <div class="col-6 col-xl-6 logo">
                    <h1 class="mb-0"><a href="{{route('home')}}" class="text-black h2 mb-0">Hikers</a></h1>
                </div>

                <div class="col-6 mr-auto py-3 text-right" style="position: relative; top: 3px;">
                    <a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-xl-none"><span class="icon-menu h3"></span></a>
                </div>
            </div>

            <div class="col-12 d-none d-xl-block border-top">
                <nav class="site-navigation text-center " role="navigation">

                    <ul class="site-menu js-clone-nav mx-auto d-none d-lg-block mb-0">
                        <li><a href="{{route('home')}}l">Home</a></li>
                        <li><a href="{{route('about')}}">About Us</a></li>
                        <li><a href="{{route('contact')}}">Contact</a></li>
                        @auth
                            <li><a href="#">
                                {{auth()->user()->name}}
                                @if(auth()->user()->avatar)
                                    <img src="{{asset('storage/'.auth()->user()->avatar )}}" alt="" height="40px">
                                @endif
                            </a></li>
                            <li><a href="{{route('logout')}}">Logout</a></li>
                        @endauth
                        @guest
                            <li><a href="{{route('register.create')}}">Registration</a></li>
                            <li><a href="{{route('login.create')}}">Login</a></li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </header>
</div>

@if(\Illuminate\Support\Facades\Request::route()->getName() !== 'home')
<div class="site-cover site-cover-sm same-height overlay single-page" style="background-image: url({{asset('assets/front/images/hero_1.jpg')}});">
    <div class="container">
        <div class="row same-height justify-content-center">
            <div class="col-md-12 col-lg-10">
                <div class="post-entry text-center">
                    <h1 class="mb-4">@yield('title')</h1>
                </div>
            </div>
        </div>
    </div>
</div>
@else
    @include('layouts.carusel')
@endif

@yield('content')

@include('layouts.footer')

<script src="{{asset('assets/front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery-migrate-3.0.1.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery-ui.js')}}"></script>
<script src="{{asset('assets/front/js/popper.min.js')}}"></script>
<script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.stellar.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.countdown.min.js')}}"></script>
<script src="{{asset('assets/front/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('assets/front/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('assets/front/js/aos.js')}}"></script>
<script src="{{asset('assets/front/js/main.js')}}"></script>

</body>
</html>
