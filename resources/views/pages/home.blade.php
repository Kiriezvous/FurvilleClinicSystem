@extends('layouts.website')

@section('content')


<div id="carouselExampleCaptions" class="carousel slide" width="80%" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/image/website/front.jpg" class="d-block" width="100%" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    
    <div class="carousel-item">
      <img src="../assets/image/website/front.jpg" class="d-block" width="100%" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
 
    <div class="carousel-item">
      <img src="../assets/image/website/front.jpg" class="d-block" width="100%" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
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

<br>
  
<div class="row row-cols-1 row-cols-md-3">
  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/1.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/2.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>

  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/3.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
      </div>
    </div>
  </div>
</div>

<div class="row row-cols-1 row-cols-md-3">  
  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/4.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  
  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/5.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
  
  <div class="col mb-4">
    <div class="card">
      <img src="../assets/image/website/6.png" class="card-img-top" alt="...">
      <div class="card-body jufity-text-center">
        <h5 class="card-title">Item Name</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
      </div>
    </div>
  </div>
</div>

<div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../assets/image/website/front.jpg" class="d-block" width="100%" alt="...">
    </div>
  </div>
</div>
      
<br>

<div class="row row-cols-1 row-cols-md-3">
@foreach($posts as $service)
@if(count($posts)> 3)
<div class="col mb-4">
  <div class="card">
    <center><img src="../assets/image/website/icons8-cat-100.png"  width="100px" alt="...">
      <div class="card-body jutify-text-center">
        <h5 class="card-title">{{$service->service_name}}</h5>
        <p class="card-text">{{$service->service_description}}</p>
        <quote>P{{$service->service_price}}</quote>
    </center>
    </div>
</div>
<br>
@else
<div class="col mb-4">
  <div class="card">
    <center><img src="../assets/image/website/icons8-cat-100.png"  width="100px" alt="...">
      <div class="card-body jutify-text-center">
        <h5 class="card-title">{{$service->service_name}}</h5>
        <p class="card-text">{{$service->service_description}}</p>
        <quote>P{{$service->service_price}}</quote>
    </center>
    </div>
</div>
@endif
@endforeach

</div>
@endsection