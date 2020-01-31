@extends('layouts.master')

@section('content')
    <a href="/appointment" class="btn btn-info">Go Back</a>
    <h1>Add Appointment</h1>
    {!! Form::open(['action'=> 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Client Name')}}
        {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('start', 'Start Date & Time')}}
        {{Form::text('start', ' ', ['class' => 'form-control', 'placeholder' => 'YYYY/MM/DD - HH/MM'])}}
    </div>
    <div class="form-group">
        {{Form::label('end', 'End Date & Time')}}
        {{Form::text('end', ' ', ['class' => 'form-control', 'placeholder' => 'YYYY/MM/DD - HH/MM'])}}
    </div>
{{--    <div class="form-group">--}}
{{--        {{Form::label('description', 'Description')}}--}}
{{--        {{Form::text('description', ' ', ['class' => 'form-control', 'placeholder' => 'Description'])}}--}}
{{--    </div>--}}
    <div class="form-group">
        {{Form::label('color', 'Service Type')}}
        {{Form::text('color', ' ', ['class' => 'form-control', 'placeholder' => 'Pick a Color'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
