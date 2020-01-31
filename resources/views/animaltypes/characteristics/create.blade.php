@extends('layouts.master')

@section('content')
    <a href="/characteristics" class="btn btn-info">Go Back</a>
    <h1>New Characteristic</h1>
    {!! Form::open(['action'=> 'BreedCharacteristicsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('characteristic', 'Characteristic')}}
                {{Form::text('characteristic', ' ', ['class' => 'form-control', 'placeholder' => 'Enter Characteristic'])}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection