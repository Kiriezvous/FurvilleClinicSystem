@extends('layouts.website')

@section('content')

<div class="container">
    <h3 class="text-center mt-5">Checkout Process</h3>
    <div class="row">
        @include('includes.error')
        <div class="col-md-9 mt-3">
            <div class="card">
                <div class="card-body">
                    {!! Form::open(['action'=> 'CheckoutController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Process Number</label>
                            <input type="text" readonly class="form-control-plaintext" id="ordernumber" value="*Leave it blank">
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="form-group">
                             <label for="exampleInputEmail1">User ID</label>
                             <input type="text" readonly class="form-control-plaintext" id="userid" name="userid" value="{{Auth::user()->id}}">
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" readonly class="form-control-plaintext" name="email" id="email" value="{{Auth::user()->email}}">
                    </div>
                    <div class="form-group">
                        <label for="name">Full name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="postal">Postal</label>
                            <input type="text" class="form-control" id="postal" name="postal" placeholder="1234">
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="phone">Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <small id="phoneHelp" class="form-text text-muted"> Eg : 08122222241  .</small>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="09163215478">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="payment">Payment Method</label>
                        <p readonly class="form-control-plaintext" id="payment">Cash on delivery</p>
                        <small class="form-text red">*Pay your order after being received</small>
                    </div>
                </div>
                <div class="card-footer">
                    {{Form::submit('Proceed', ['class'=>'btn btn-success float-right'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <div class="col-md-3 mt-3">
            <div class="card">
                <div class="card-head">
                    <h4 class="mt-3 text-center">Cart</h4>
                </div>
                <div class="card-body">
                    @foreach(Cart::content($product) as $prod)
                        <div class="row">
                            <div class="col-md-6">
                                <p>{{$prod->name}}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <b>{{$prod->qty}}</b>
                                    </div>

                                    <div class="col-md-6">
                                        <b>{{$prod->price}}</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            Total:
                        </div>
                        <div class="col-md-6 float-right">
                            <b>{{Cart::total()}}</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
