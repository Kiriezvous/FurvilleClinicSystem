@extends('layouts.website')

@section('content')

<div class="container mt-5 mb-5">
    <div class="jumbotron">
        <h1 class="display-4">Thank you for purchasing, {{Auth::user()->name}}!</h1>
        <p class="lead">For further notice, please check your contact for your order</p>
        <hr class="my-4">
        <p></p>
        <p class="lead">
            <a class="btn btn-primary btn-lg" href="{{route("ShoppingCart")}}" role="button">Back Shopping</a>
        </p>
    </div>
</div>

@endsection
