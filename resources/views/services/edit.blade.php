@extends('layouts.master')

@section('content')
    <a href="/services" class="btn btn-info">Go Back</a>
    <h1>Update Service</h1>
    {!! Form::open(['action'=> ['ServicesController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('service_name', 'Service Name')}}
                {{Form::text('service_name', ' ', ['class' => 'form-control', 'placeholder' => 'Service Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('service_description', 'Service Description')}}
                {{Form::text('service_description', ' ', ['class' => 'form-control', 'placeholder' => 'Service Description'])}}
            </div>
            <div class="form-group">
                {{Form::label('service_price', 'Service Price')}}
                {{Form::text('service_price', ' ', ['class' => 'form-control', 'placeholder' => 'Service Price'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection