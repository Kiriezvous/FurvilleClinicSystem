@extends('layouts.master')

@section('content')
    <a href="/categories" class="btn btn-info">Go Back</a>
    <h1>Update Category</h1>
    {!! Form::open(['action'=> ['CategoriesController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('category_type', 'Category Type')}}
                {{Form::text('category_type', $post->category_type, ['class' => 'form-control', 'placeholder' => 'Category Type'])}}
            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::text('description', $post->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
            </div>
            {{Form::hidden('_method', 'PUT')}}
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection