@extends('layouts.master')

@section('content')
    <a href="/animaltypes" class="btn btn-info">Go Back</a>
    <h1>Add Animal Type</h1>
    {!! Form::open(['action'=> 'AnimalTypesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('animal_type', 'Animal Type')}}
        {{Form::text('animal_type', "", ['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::text('description', "", ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form-group">
        {{Form::file('image')}}
    </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection