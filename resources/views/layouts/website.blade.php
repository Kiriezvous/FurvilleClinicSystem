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
    <!-- Full Calendar -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <!-- Data Tables -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="/jquery.datetimepicker.css">
    <link rel="stylesheet" href="/css/website.css">

    <!-- Popup Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!-- Filthypillow -->
    <script type="text/javascript" src="filthypillow/libs/jquery.js"></script>
    <script type="text/javascript" src="filthypillow/libs/moment.js"></script>
    <script type="text/javascript" src="filthypillow/libs/jquery.filthypillow.js"></script>
    <link rel="stylesheet" type="text/css" href="filthypillow/jquery.filthypillow.css">

    <!-- Chartist js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
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
                    <h5><a class="nav-link" href="{{route('Appointment')}}"><b style="color:white;">APPOINTMENT</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href="{{route('Gallery')}}"><b style="color:white;">GALLERY</b></a></h5>
                </li>
                <li class="nav-item">
                    <h5><a class="nav-link" href=""><b style="color:white;">BREEDS</b></a></h5>
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
                                <button class="dropdown-item" type="button"><b>Setting</b></button>
                                <a class="nav-link dropdown-item btn" href="">
                                    <i class="nav-icon fas fa-power-off"></i>

                                    <P>{{ __('Logout') }}</P>
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

    $('.carousel').carousel()

    $('#carouselExampleControls').on('slide.bs.carousel', function () {

    })

    $(".gallery").magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled: true
        }
    });

    var $fp = $(".filthypillow"),
        now = moment().subtract("seconds", 1);

    $fp.filthypillow(
        /*{
        minDateTime: function( ) {
        return now;
        }
        }*/
    );
    $fp.on("focus", function () {
        $fp.filthypillow("show");
    });
    $fp.on("fp:save", function (e, dateObj) {
        $fp.val(dateObj.format("MMM DD YYYY hh:mm A"));
        $fp.filthypillow("hide");
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
{{--<script src="../../assets/js/vendor/popper.min.js"></script>--}}
{{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
{{--<!-- Just to make our placeholder images work. Don't actually copy the next line! -->--}}
{{--<script src="../../assets/js/vendor/holder.min.js"></script>'--}}
{{--<script src="/js/bootstrap-datetimepicker.js"></script>--}}
{{--<script src="/js/moment-with-locale.js"></script>--}}


</body>
</html>
