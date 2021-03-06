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

            </div>
            <div class="carousel-item">
                <img src="/img/banner2.jpg" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="/img/banner3.png" class="d-block w-100" alt="...">

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

    <div class="container mt-5">
<div class="row row-cols-1 row-cols-md-3">
    @foreach($Services as $s)
    <div class="col mb-4">
        <div class="card">
        <img src="img/{{$s->service_type}}" alt="..." class="card-service-img center">
            <div class="card-body jufity-text-center">
              <h5 class="card-service-title">{{$s->service_name}}</h5>
              <p class="card-text">{{$s->service_description}}</p>
            </div>
            <div class="card-footer">
                <span class="float-right" style="font-size: 35px;">PHP {{$s->service_price}}</span>
            </div>
        </div>
    </div>
    @endforeach
</div>


@endsection
