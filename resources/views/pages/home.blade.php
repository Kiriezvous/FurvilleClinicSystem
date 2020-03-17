@extends('layouts.website')

@section('content')
{{--    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">--}}
{{--        <div class="carousel-inner">--}}
{{--            <div class="carousel-item">--}}
{{--                <img class="d-block w-100" src="/img/banner1.png" alt="First slide">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img class="d-block w-100" src="/img/banner2.jpg" alt="Second slide">--}}
{{--            </div>--}}
{{--            <div class="carousel-item">--}}
{{--                <img class="d-block w-100" src="/img/banner3.jpg" alt="Third slide">--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">--}}
{{--            <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--            <span class="sr-only">Previous</span>--}}
{{--        </a>--}}
{{--        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">--}}
{{--            <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--            <span class="sr-only">Next</span>--}}
{{--        </a>--}}
{{--    </div>--}}


    <section id="services">
        <div class="container">
            <h1 class="title-about text-center" style="color: white;">About Furville</h1>
            <div class="row">
                <div class="col-md-6 mt-5">
                    <p class="about-description">A veterninary clinic that treats dogs and cats. Furville veterinary clinic offers a lot of services from general wellness and health assessments of pets to minor and major surgeries. Vaccination, deworming, grooming is also part of thier services. We also have pet accessories and merchandises</p>
                    <span class="float-right"><a href="/about" style="text-decoration: none; color: white;"><h5>Check it&nbsp;<i class="fas fa-arrow-circle-right" style="color: white;"></i></h5></a></span>
                </div>
                <div class="col-md-6">
                    <img src="img/home.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>

</section>
    <svg class="svg-color2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L24,42.7C48,53,96,75,144,112C192,149,240,203,288,192C336,181,384,107,432,117.3C480,128,528,224,576,229.3C624,235,672,149,720,128C768,107,816,149,864,165.3C912,181,960,171,1008,144C1056,117,1104,75,1152,64C1200,53,1248,75,1296,96C1344,117,1392,139,1416,149.3L1440,160L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>
    <section id="products">
    <div class="container">
        <h1 class="title-about text-center">Products</h1>
        <hr>
        <div class="row ml-2">
            @foreach($Products as $p)

            <div class="card">
                <img src="/assets/images/{{$p->image}}">
                <div class="card-text">
                    <span class="date">Price: {{$p->product_price}}</span>
                    <h2>{{$p->product_name}}</h2>
                </div>
                <div class="col-12">
                <div class="card-stats text-justify">
                        <button type="button" class="btn btn-primary">View Product</button>
                </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</section>

    <!--- About ---->
    <svg class="svg-color2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L17.1,117.3C34.3,139,69,181,103,218.7C137.1,256,171,288,206,261.3C240,235,274,149,309,117.3C342.9,85,377,107,411,149.3C445.7,192,480,256,514,277.3C548.6,299,583,277,617,250.7C651.4,224,686,192,720,186.7C754.3,181,789,203,823,208C857.1,213,891,203,926,213.3C960,224,994,256,1029,240C1062.9,224,1097,160,1131,128C1165.7,96,1200,96,1234,122.7C1268.6,149,1303,203,1337,213.3C1371.4,224,1406,192,1423,176L1440,160L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z"></path></svg>

    <section id="services">
        <div class="container text-center">
            <h1 class="title-white">WHAT SERVICES WE DO?</h1>
            <div class="row">
                @foreach($Services as $s)
                <div class="col-md-4 services">
                    <img src="img/{{$s->service_type}}" alt="" class="service-img">
                    <h2>{{$s->service_name}}</h2>
                    <p style="font-size: 25px">{{$s->service_description}}</p>
                </div>
                @endforeach

            </div>
            <button type="button" class="btn btn-primary"><a href="/service">View All Services</a></button>
        </div>
    </section>

    <!---------Services----------->
<svg class="svg-color2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,32L24,42.7C48,53,96,75,144,112C192,149,240,203,288,192C336,181,384,107,432,117.3C480,128,528,224,576,229.3C624,235,672,149,720,128C768,107,816,149,864,165.3C912,181,960,171,1008,144C1056,117,1104,75,1152,64C1200,53,1248,75,1296,96C1344,117,1392,139,1416,149.3L1440,160L1440,320L1416,320C1392,320,1344,320,1296,320C1248,320,1200,320,1152,320C1104,320,1056,320,1008,320C960,320,912,320,864,320C816,320,768,320,720,320C672,320,624,320,576,320C528,320,480,320,432,320C384,320,336,320,288,320C240,320,192,320,144,320C96,320,48,320,24,320L0,320Z"></path></svg>

    <section id="about">
        <div class="container">
            <h1 class="title-about text-center">Appointment Furville</h1>
            <div class="row mt-5">
                <div class="col-md-6 about">
                    <p class="service-title">Set your Appointment</p>
                    <p class="service-description">Hello insert text here</p>
                    <span class="float-right"><a href="/online-appointment" style="text-decoration: none; color: black;"><h5>Check it&nbsp;<i class="fas fa-arrow-circle-right" style="color: black;"></i></h5></a></span>
                </div>
                <div class="col-md-6">
                    <img src="img/appointment.png" alt="" class="img-fluid">
                </div>
            </div>
        </div>


</section>

    <!--- About ---->
<svg class="svg-color2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,96L17.1,117.3C34.3,139,69,181,103,218.7C137.1,256,171,288,206,261.3C240,235,274,149,309,117.3C342.9,85,377,107,411,149.3C445.7,192,480,256,514,277.3C548.6,299,583,277,617,250.7C651.4,224,686,192,720,186.7C754.3,181,789,203,823,208C857.1,213,891,203,926,213.3C960,224,994,256,1029,240C1062.9,224,1097,160,1131,128C1165.7,96,1200,96,1234,122.7C1268.6,149,1303,203,1337,213.3C1371.4,224,1406,192,1423,176L1440,160L1440,0L1422.9,0C1405.7,0,1371,0,1337,0C1302.9,0,1269,0,1234,0C1200,0,1166,0,1131,0C1097.1,0,1063,0,1029,0C994.3,0,960,0,926,0C891.4,0,857,0,823,0C788.6,0,754,0,720,0C685.7,0,651,0,617,0C582.9,0,549,0,514,0C480,0,446,0,411,0C377.1,0,343,0,309,0C274.3,0,240,0,206,0C171.4,0,137,0,103,0C68.6,0,34,0,17,0L0,0Z"></path></svg>
    <section id="doctors">
        <div class="container">
         <h1 class="title-white text-center">Our Doctors</h1>
            <div class="row">
                @foreach($Doctors as $d)
                <div class="col-md-4">
                    <div class="insider">
                        <div class="doctors">
                            <div class="doctors-img">
                                <img src="/assets/images/{{$d->image}}" alt="">
                            </div>
                            <h4>{{$d->name}}</h4>
                            <p>{{$d->email}}</p>
                        </div>
                        <div class="dropShadow1"></div>
                        <div class="dropShadow2"></div>
                    </div>
                </div>
                @endforeach
         </div>
    </div>
</section>


<div class="gallery-section">
    <div class="inner-width">
        <h1>Gallery</h1>
        <div class="border"></div>
        <div class="gallery">
            <a href="/img/1-Yuki-After-5792a4b7595c4__700.jpg" class="image">
                <img src="img/1-Yuki-After-5792a4b7595c4__700.jpg" alt="">
            </a>
            <a href="/img/2-Athena_After_square-5792a4731c84a__700.jpg" class="image">
                <img src="img/2-Athena_After_square-5792a4731c84a__700.jpg" alt="">
            </a>
            <a href="/img/3_Teddy_after_square-5792a495096b3__700.jpg" class="image">
                <img src="img/3_Teddy_after_square-5792a495096b3__700.jpg" alt="">
            </a>
            <a href="/img/4-Herman-After-Square-5792a4493f0cf__700.jpg" class="image">
                <img src="img/4-Herman-After-Square-5792a4493f0cf__700.jpg" alt="">
            </a>
            <a href="/img/5-Raider_After-Square-5792a3d1f0e81__700.jpg" class="image">
                <img src="img/5-Raider_After-Square-5792a3d1f0e81__700.jpg" alt="">
            </a>
        </div>
    </div>
</div>
@endsection
