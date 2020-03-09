@extends('layouts.website')

@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/banner1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/banner2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/banner3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="row justify-content-center mt-5">
    <h1>About Furville</h1>
        </hr>
    </div>
<div class="row no-gutters bg-light position-relative">
  <div class="col-md-6 mb-md-0 p-md-4">

      <p class="service-description" style="color: black;">A veterninary clinic that treats dogs and cats. Furville veterinary clinic offers a lot of services from general wellness and health assessments of pets to minor and major surgeries. Vaccination, deworming, grooming is also part of thier services. We also have pet accessories and merchandises</p>
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
  <img src="img/banner1.png" class="d-block" width="100%" alt="...">
  </div>
</div>

    <div class="missionvision">
        <div class="box">
            <div class="icon"><i class="fa fa-user" aria-hidden="true"></i></div>
            <div class="content">
                <h1 style="color: white;">Mission</h1>
                <p>Description</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><i class="fa fa-street-view" aria-hidden="true"></i></div>
            <div class="content">
                <h3>Vision</h3>
                <p>Description</p>
            </div>
        </div>
        <div class="box">
            <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
            <div class="content">
                <h3>Location</h3>
                <p>Description</p>
            </div>
        </div>
    </div>

    <div class="container">
        <h1>Our Doctors</h1>
    </div>
@endsection
