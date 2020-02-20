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
                    <a class="nav-link" href="/home">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/about">ABOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/service">SERVICES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/online-appointment">APPOINTMENT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/gallery">GALLERY</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/breeds">BREEDS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/shoppingcart">SHOP</a>
                </li>
            </ul>

            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/profile') }}" style="color: white;">Profile</a>
                    @else
                        <a href="{{ route('login') }}" style="color: white;">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color: white;">Register</a>
                        @endif
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
<footer class="container mt-3">

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
