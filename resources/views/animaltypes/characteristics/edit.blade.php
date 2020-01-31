@extends('layouts.master')

@section('content')
    <a href="/characteristics" class="btn btn-info">Go Back</a>
    <h1>Update Characteristic</h1>
    {!! Form::open(['action'=> ['BreedCharacteristicsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('characteristic', 'Characteristic')}}
                {{Form::text('characteristic', $post->characteristics, ['class' => 'form-control', 'placeholder' => 'Enter Characteristic'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection