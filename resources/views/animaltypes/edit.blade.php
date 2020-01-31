@extends('layouts.master')

@section('content')
    <a href="/animaltypes" class="btn btn-info">Go Back</a>
    <h1>Update Animal Category</h1>
    {!! Form::open(['action'=> ['AnimalTypesController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('animal_type', 'Animal Type')}}
                {{Form::text('animal_type', $post->animal_type, ['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $post->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            <div class="form-group">
                {{Form::file('image')}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection