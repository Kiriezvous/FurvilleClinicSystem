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
                            <input type="text" readonly class="form-control-plaintext" id="ordernumber" value="ORD-{{mt_rand(15, 50)}}">
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
                    <div class="row">
                        <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">First name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{{Auth::user()->fname}}">
                    </div>
                        </div>
                            <div class="col-md-6">
                    <div class="form-group">
                        <label for="name">Last name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Full Name" value="{{Auth::user()->lname}}">
                    </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="{{Auth::user()->address}}">
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="city">City</label>
{{--                            <input type="text" class="form-control" id="city" name="city" placeholder="Enter City">--}}
                            <select name="time" class="form-control">
                                <option value="Caloocan">Caloocan</option>
                                <option value="Las Pinas">Las Pinas</option>
                                <option value="Makati">Makati</option>
                                <option value="Malabon">Malabon</option>
                                <option value="Mandaluyong">Mandaluyong</option>
                                <option value="Manila">Manila</option>
                                <option value="Marikina">Marikina</option>
                                <option value="Muntinlupa">Muntinlupa</option>
                                <option value="Navotas">Navotas</option>
                                <option value="Paranaque">Paranaque</option>
                                <option value="Pasay">Pasay</option>
                                <option value="Pasig">Pasig</option>
                                <option value="Quezon City">Quezon City</option>
                                <option value="San Juan">San Juan</option>
                                <option value="Taguig">Taguig</option>
                                <option value="Valenzuela">Valenzuela</option>
                            </select>
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
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="09163215478" value="{{Auth::user()->phone}}">
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
