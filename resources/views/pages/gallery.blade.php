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


    <div class="gallery-section">
        <div class="inner-width">
            <h1>Gallery</h1>
            <div class="border"></div>
            <div class="gallery">
                <a href="/img/1-Yuki-Before.jpg" class="image">
                    <img src="/img/1-Yuki-Before.jpg" alt="">
                </a>
                <a href="/img/1-Yuki-After.jpg" class="image">
                    <img src="/img/1-Yuki-After.jpg" alt="">
                </a>
                <a href="/img/2-Athena_Before.jpg" class="image">
                    <img src="/img/2-Athena_Before.jpg" alt="">
                </a>
                <a href="/img/2-Athena_After.jpg" class="image">
                    <img src="/img/2-Athena_After.jpg" alt="">
                </a>
                <a href="/img/3-Teddy_Before.jpg" class="image">
                    <img src="/img/3-Teddy_Before.jpg" alt="">
                </a>
                <a href="/img/3_Teddy_after.jpg" class="image">
                    <img src="/img/3_Teddy_after.jpg" alt="">
                </a>
                <a href="/img/4-Herman_Before.jpg" class="image">
                    <img src="/img/4-Herman_Before.jpg" alt="">
                </a>
                <a href="/img/4-Herman-After.jpg" class="image">
                    <img src="/img/4-Herman-After.jpg" alt="">
                </a>
                <a href="/img/5-Raider-Before.jpg" class="image">
                    <img src="/img/5-Raider-Before.jpg" alt="">
                </a>
                <a href="/img/5-Raider_After.jpg" class="image">
                    <img src="/img/5-Raider_After.jpg" alt="">
                </a>
            </div>
        </div>
    </div>

@endsection
