<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Furville Clinic</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Admin -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="/jquery.datetimepicker.css">
    <link rel="stylesheet" href="/css/website.css">

    <!-- Popup Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!-- Chartist js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <link href='{{asset ('assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet'  />
    <link href='{{asset ('assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/css/style.css') }}' rel='stylesheet' />

</head>
<body>
<header>
    <section id="nav-bar">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="/home"><img src="/img/logo.png"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('Home')}}"><b style="color:white;">HOME</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('About')}}"><b style="color:white;">ABOUT</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('Service')}}"><b style="color:white;">SERVICES</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('appointment.create')}}"><b style="color:white;">APPOINTMENT</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('Gallery')}}"><b style="color:white;">GALLERY</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('ShoppingCart')}}"><b style="color:white;">SHOP</b></a></h5>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="top-right links mr-3">
                    @auth
{{--{{route('cart.index')}}--}}
                        <div class="navbar">
                            <a href="{{route('cart.index')}}">
                                <h5>
                                    <span class="nav-item fas fa-cart-plus right badge badge-warning mr-2">
                                        Cart
                                        @if(Cart::instance('default')->count() > 0)
                                        : {{Cart::instance('default')->count()}}
                                        @endif
                                    </span>
                                </h5>
                            </a>
                            <h5><a href="{{ url('profile') }}" style="color: white;"><b>Profile</b></a></h5>
                            <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                            </div>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="nav-link dropdown-item btn" href="{{route('logout')}}">
                                    <i class="nav-icon fas fa-power-off"></i> {{ __('Logout') }}
                                </a>
                            </div>
                        </div>
                    @else
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                        <h5><a href="{{ route('login') }}" style="color: white;"><b>Login</b></a></h5>
                            </li>
                        @if (Route::has('register'))
                                <li class="nav-item">
                            <h5><a href="{{ route('register') }}" style="color: white;"><b>Register</b></a></h5>
                                </li>
                        @endif
                        </ul>
                    @endauth
                </div>
            @endif
        </div>
    </nav>
    </section>
</header>
<main role="main">

@include('sweetalert::alert')
    @yield('content')



<!-- FOOTER -->
<footer class="container mt-3 sticky-bottom">

    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>

</footer>
</main>
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script>
    $(".slider-one")
        .not(".slick-intialized")
        .slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
            prevArrow: ".site-slider.slider-btn.prev",
            nextArrow: ".site-slider.slider-btn.next",
        });
</script>
<script>
    $('.carousel').carousel()

    $(".gallery").magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src='{{asset ('assets/fullcalendar/packages/core/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/interaction/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/daygrid/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/timegrid/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/list/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/core/locales-all.js') }}'></script>



</body>
</html>
