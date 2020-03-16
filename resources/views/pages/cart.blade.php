@extends('layouts.website')

@section('content')
    <div class="container mt-3">
        <!-- Default box -->

        <div class="card card-solid">
            @if(Cart::count() > 0)

                <div class="card-header">
                    {{Cart::count()}} item(s) in your Cart
                </div>
                <div class="card-body">
                    @include('includes.error')
                    <div class="row">
                                @foreach(Cart::content($product) as $prod)
                            <div class="col-12 col-md-6">
                                <h3>{{$prod->name}}</h3>
                                <div class="col-12">
                                    <img src="/assets/images/{{$prod->model->image}}" width="100%" height="60%" class="product-image" alt="Product Image">
                                </div>

                                <div class="row mt-3 ml-2">
                                <div class="col-md-6">
                                    <label for="qty">Quantity</label>
                                    @if($prod->qty > $prod->model->product_quantity)
                                        {{redirect()->route('cart.index')->with('error', 'It exceeds from the stocks')}}
                                    @endif
                                    <form action="{{route('cart.update', $prod->rowId)}}" method="post" role="form">
                                        {{method_field('PUT')}}
                                        @csrf
                                        <input type="hidden" name="prodID" value="{{$prod->id}}">
                                        <input type="number" size="2" value="{{$prod->qty}}" name="qty" class="form-control">

                                        <input type="submit" class="btn btn-success btn-sm mt-2 mb-2" value="Update">
                                    </form>
                                </div>
                                <div class="col-md-6">
                                    <label>Price</label><br>
                                {{$prod->price}}
                                </div>
                                </div>
                            </div>
                            <form action="{{route('cart.remove', $prod->rowId)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-default"><i class="fas fa-trash"></i> Remove Item</button>
                            </form>
                            <form action="{{route('cart.wishlist', $prod->rowId)}}" method="POST">
                                @csrf

                                <button type="submit" class="btn btn-default"><i class="fas fa-heart fa-lg mr-2"></i> Add to Wishlist Item</button>
                            </form>
                                @endforeach


                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12 text-right">
                                Total: PHP <u style="color: red; font-size: 24px;">{{Cart::total()}}</u>

                            </div>
                        </div>
                    </div>
                    <a href="{{route('checkout.index')}}" class="btn btn-primary float-right mt-2">Checkout</a>
                @else

                     <div class="card-header">
                         <h1>Cart</h1>
                     </div>
                    <div class="card-body">
                        <h5>There's no item(s) in your Cart</h5>
                        <div>

                        <button type="submit" class="btn btn-warning btn-flat bg-lg"><i class="fas fa-cart-plus"></i> <a
                                href="{{route('ShoppingCart')}}" style="text-decoration: none; color:black;">Continue Shopping</a></button>

                        </div>
                        </div>
                @endif
            </div>

        </div>


    </div>
<hr>
    <div class="container mt-3">
        <div class="card card-solid">
            @if(Cart::instance('wishlist')->count() > 0)

                <div class="card-header">
                    {{Cart::instance('wishlist')->count()}} item(s) in your Wishlist
                </div>
                <div class="card-body">

                    <div class="row">

                        {{--                            {{dd($prod)}}--}}
                        @foreach(Cart::content() as $prod)
                            <div class="col-12 col-md-6">
                                <h3>{{$prod->name}}</h3>
                                <div class="col-12">


                                    <img src="assets/images/{{$product->image}}" width="100%" height="60%" class="product-image" alt="Product Image">

                                </div>
                                <div class="col-12 col-md-6">
                                    <h3>{{$prod->qty}}</h3>
                                </div>
                                {{$prod->price}}
                            </div>

                            <form action="{{route('cart.removeWishlist', $prod->rowId)}}" method="POST">
                                @csrf
                                {{method_field('DELETE')}}
                                <button type="submit" class="btn btn-default"><i class="fas fa-trash"></i> Remove Item</button>
                            </form>
                            {!! Form::open(['action'=> ['CartController@movetoCart', $prod->rowId], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            @csrf

                            <button type="submit" class="btn btn-default"><i class="fas fa-cart-plus"></i> Move to Cart</button>
                            {!!Form::close()!!}
                        @endforeach


                    </div>

                    @else

                        <div class="card-header">
                            <h1>Wishlist</h1>
                        </div>
                        <div class="card-body">
                            <h5>There's no item(s) in your Wishlist</h5>
                        </div>
                    @endif
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
                                    <img src="assets/images/{{$product->image}}" width="100%" height="60%" class="product-image" alt="Product Image">
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
