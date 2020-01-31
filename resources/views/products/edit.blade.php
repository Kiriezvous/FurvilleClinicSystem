@extends('layouts.master')

@section('content')
    <a href="/products" class="btn btn-info">Go Back</a>
    <h1>Edit Post</h1>
    {!! Form::open(['action'=> ['ProductsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('product_name', 'Product Name')}}
                {{Form::text('product_name', $post->product_name, ['class' => 'form-control', 'placeholder' => 'Product Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('', 'Characteristic Type')}}
                <select name="category" class = 'form-control'>
                    <option name="default">---- SELECT CATEGORY TYPE ----</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->category_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('product_quantity', 'Quantity')}}
                {{Form::text('product_quantity', $post->product_quantity, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
            </div>
            <div class="form-group">
                {{Form::label('product_description', 'Description')}}
                {{Form::text('product_description', $post->product_description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('product_price', 'Price')}}
                {{Form::text('product_price', $post->product_price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
            </div>
            <div class="form-group">
                {{Form::file('image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection