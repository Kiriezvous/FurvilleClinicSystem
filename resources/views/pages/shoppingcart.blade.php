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
                <img src="/img/slider2.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <ul class="nav nav-pills mb-3 mr-5 justify-content-center" id="pills-tab" role="tablist">
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
                            <a href="{{route('shop.show', $prod->product_name)}}"><img class="card-img-top" src="/assets/images/{{$prod->image}}" alt="Card image cap"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{$prod->product_name}}</h5>
                                <p class="card-text"><span class="date">Price: {{$prod->product_price}}</span></p>
                                <div class="row">
                                    <div class="col-md-6">

                                        {!! Form::open(['action'=> ['CartController@store', $prod->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $prod->id }}">
                                        <input type="hidden" name="name" value="{{ $prod->product_name }}">
                                        <input type="hidden" name="qty" value="{{ $prod->product_quantity }}">
                                        <input type="hidden" name="price" value="{{ $prod->product_price }}">
                                        {{Form::hidden('buynow', 1)}}
                                        <button type="submit" class="btn btn-warning"><i class="fas fa-shopping-cart"></i> BUY NOW</button>
                                        {!!Form::close()!!}

                                    </div>

                                    <div class="col-md-6">
                                    {!! Form::open(['action'=> ['CartController@store', $prod->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                    <input type="hidden" name="id" value="{{ $prod->id }}">
                                    <input type="hidden" name="name" value="{{ $prod->product_name }}">
                                    <input type="hidden" name="qty" value="{{ $prod->product_quantity }}">
                                    <input type="hidden" name="price" value="{{ $prod->product_price }}">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-cart-plus"></i> CART</button>
                                {!!Form::close()!!}
                                    </div>
                                </div>
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
