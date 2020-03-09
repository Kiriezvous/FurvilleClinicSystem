@extends('layouts.website')

@section('content')
    <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$product->product_name}}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/home">Home</a></li>
                        <li class="breadcrumb-item"><a href="/shop">Shop</a></li>
                        <li class="breadcrumb-item active">{{$product->product_name}}</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h3 class="d-inline-block d-sm-none">{{$product->product_name}}</h3>
                        <div class="col-12">
                            <img src="/assets/images/products/{{$product->image}}" width="100%" height="60%" class="product-image" alt="Product Image">
                        </div>

                    </div>

                    <div class="col-12 col-md-6">
                        <h3 class="my-3">{{$product->product_name}}</h3>
                        <p>{{$product->product_description}}</p>
                        <hr>
                        <div class="bg-gray py-2 px-3 mt-4">
                            <h2 class="mb-0">
                                PHP {{$product->product_price}}
                            </h2>
                        </div>
                        <div class="mt-4">
                            <div class="btn btn-primary btn-lg btn-flat">

                                {!! Form::open(['action'=> ['CartController@store', $product->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                @csrf
                                <input type="hidden" name="id" value="{{ $product->id }}">
                                <input type="hidden" name="name" value="{{ $product->product_name }}">
                                <input type="hidden" name="qty" value="{{ $product->product_quantity }}">
                                <input type="hidden" name="price" value="{{ $product->product_price}}">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-cart-plus"></i> CART</button>
                                {!!Form::close()!!}
                            </div>

{{--                            <div class="btn btn-default btn-lg btn-flat">--}}

{{--                                    {!! Form::open(['action'=> [{{route('cart.wishlist')}}, $product->rowId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}--}}
{{--                                    @csrf--}}

{{--                                    <button type="submit" class="btn btn-default"><i class="fas fa-heart fa-lg mr-2"></i>Add to Wishlist</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container orange">
        <hr>
        <div class="card">
            <div class="card-header">
        <h2>You might also like</h2>
            </div>
            <div class="card-body">
        <div class="row">
            @foreach($mightAlsoLike as $product)
                <div class="col-md-3">
                    <div class="card">
                    <a href="#" class=""></a>
                        <div class="card-header">
                            <img src="/assets/images/products/{{$product->image}}" width="100%" height="60%" class="product-image" alt="Product Image">
                        </div>
                        <div class="card-body">
                            <div class="might-like-product-name"><a href="{{route('shop.show', $product->product_name)}}"><h4>{{$product->product_name}}</h4></a></div>
                            <div class="might-like-product-price"><b>Price:{{$product->product_price}}</b></div>
                        </div>

                    </div>
                </div>
            @endforeach

        </div>
            </div>
        </div>
    </div>
@endsection
