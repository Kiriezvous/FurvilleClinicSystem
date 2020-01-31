@extends('layouts.master')

@section('content')
    <a href="/cats" class="btn btn-info">Go Back</a>
    <h1>Add Breed</h1>
    {!! Form::open(['action'=> 'CatsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('breed_name', 'Breed')}}
                {{Form::text('breed_name', '', ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class="form-group">
                {{Form::label('breed_description', 'Description')}}
                {{Form::text('breed_description', '', ['class' => 'form-control', 'placeholder' => ''])}}
            </div>
            <div class="form-group">
                {{Form::label('', 'Characteristic Type')}}
                <select name="category" class = 'form-control'>
                    <option name="default">---- SELECT CHARACTERISTIC TYPE ----</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->characteristic}}</option>
                    @endforeach
                </select>
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection