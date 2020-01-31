@extends('layouts.master')

@section('content')
    <a href="/dogs" class="btn btn-info">Go Back</a>
    <h1>Add Breed</h1>
    {!! Form::open(['action'=> 'DogsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('breed_name', 'Breed')}}
                {{Form::text('breed_name', '', ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class="form-group">
                {{Form::label('breed_description', 'Description')}}
                {{Form::text('breed_description', '', ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class="form-group">
                {{Form::label('', 'Animal Type')}}
                <select name="category" class = 'form-control'>
                    <option name="default">Choose an Animal Type</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->animal_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::file('image')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection