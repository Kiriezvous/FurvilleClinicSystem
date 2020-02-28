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
                <img src="/img/slider1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slider2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="/img/slider3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <ul class="nav nav-pills mb-3 mr-5 justify-content-center" id="pills-tab" role="tablist">
        <li class="nav-item">
            <a class="nav-link" id="pills-all-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">All</a>
        </li>
        @foreach($Categories as $category)
        <li class="nav-item">
            <a class="nav-link" id="pills-{{$category->category_type}}-tab" data-toggle="pill" href="#pills-{{$category->category_type}}" role="tab" aria-controls="pills-home" aria-selected="true">{{$category->category_type}}</a>
        </li>
        @endforeach
    </ul>
</div>

        <div class="tab-content ml-5 mr-5" id="pills-tabContent">
            @foreach($Categories as $type)
            <div class="tab-pane fade show" id="pills-{{$type->category_type}}" role="tabpanel" aria-labelledby="pills-home-tab">
            <div class="row">
                @foreach($Products as $prod)
                    @if($type->id == $prod->category_id)
                    <div class="col-md-3">
                        <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="assets/images/products/{{$prod->image}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$prod->product_name}}</h5>
                                <p class="card-text"><span class="date">Price: {{$prod->product_price}}</span></p>
                                <a href="#" class="btn btn-warning"><i class="fas fa-cart-plus">&nbsp;Add Cart</i></a>
                                <a href="#" class="btn btn-success"><i class="fas fa-shopping-cart">&nbsp;View Cart</i></a>

                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            </div>
                @endforeach
        </div>
@endsection
