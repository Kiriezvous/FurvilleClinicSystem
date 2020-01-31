@extends('layouts.master')

@section('content')
    <a href="/pets" class="btn btn-info">Go Back</a>
    <h1>Add Pet</h1>
    {!! Form::open(['action'=> 'PetsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('', 'Type')}}
        <select name="type" class = 'form-control'>
            <option name="default">Choose a Type</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}">{{$type->animal_type}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
                {{Form::label('name', 'Pet Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Pet Name'])}}
            </div>
            <div class="form-group">
                {{Form::label('', 'Gender')}}
                <select name="gender" class = 'form-control'>
                    <option name="default">Choose a Gender</option>
                    @foreach ($genders as $gender)
                        <option value="{{$gender->id}}">{{$gender->gender}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('', 'Blood Type')}}
                <select name="bloodtype" class = 'form-control'>
                    <option name="default">Choose a Blood Type</option>
                    @foreach ($blood_types as $blood_type)
                        <option value="{{$blood_type->id}}">{{$blood_type->blood_type}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('', 'Weight')}}
                <select name="weight" class = 'form-control'>
                    <option name="default">Choose a Weight</option>
                    @foreach ($measurements as $measurement)
                        <option value="{{$measurement->id}}">{{$measurement->weight}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('', 'Height')}}
                <select name="height" class = 'form-control'>
                    <option name="default">Choose a Height</option>
                    @foreach ($measurements as $measurement)
                        <option value="{{$measurement->id}}">{{$measurement->height}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                {{Form::label('', 'Profile Image')}}
                {{Form::file('image')}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection