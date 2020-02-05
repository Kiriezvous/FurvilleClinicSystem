@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Animal</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Breed</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Animal Breed</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add New Breed
                </button>
            </div>
        </div>
    </div>

    <div class="card-body">
        <table id="doctorTable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th class="th-lg">Image</th>
                <th class="th-lg">Animal Type</th>
                <th class="th-lg">Breed Name</th>
                <th class="th-lg">Description</th>
                <th class="th-lg">Actions</th>
            </tr>
            </thead>
            <!--Table head-->
            <!--Table body-->
            <tbody>
            @foreach($Breed as $b)
                <tr>
                    <td scope="row">{{$b->id}}</td>
                    <td><img width="100%" src="/storage/assets/image/breed/{{$b->image}}"></td>
                    <td>{{$b->pettype->name}}</td>
                    <td>{{$b->name}}</td>
                    <td>{{$b->description}}</td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$b->id}}">
                            <i class="fas fa-user-edit"></i> Edit
                        </a>
                        {!!Form::open(['action' => ['BreedController@destroy', $b->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}

                        {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                        {!!Form::close()!!}
                    </td>
                    <!-- Modal -->
                    <div class="modal fade" id="edit{{$b->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['action'=> ['BreedController@update', $b->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="form-group">
                                        {{Form::label('', 'Animal Type')}}
                                        <select name="animaltype" class = 'form-control'>
                                            @foreach ($Animal as $type)
                                                <option value="{{$type->id}}">{{$type->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('name', 'Breed Name')}}
                                        {{Form::text('name', $b->name, ['class' => 'form-control', 'placeholder' => 'Breed Name'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description', 'Description')}}
                                        {{Form::text('description', $b->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::file('image')}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    {{Form::hidden('_method', 'PUT')}}
                                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach

            </tbody>
            <tfoot>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Animal Type</th>
                <th>Breed Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=> 'BreedController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('', 'Animal Type')}}
                        <select name="animaltype" class = 'form-control'>
                            <option name="default">---- SELECT ANIMAL TYPE ----</option>
                            @foreach ($Animal as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Breed Name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Breed Name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description')}}
                        {{Form::text('description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
