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
                        <li class="breadcrumb-item active">Types</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Animal Types</h3>
            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add New Type
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
                <th class="th-lg">Description</th>
                <th class="th-lg">Actions</th>
            </tr>
            </thead>
            <!--Table head-->
            <!--Table body-->
            <tbody>
            @foreach($animal as $type)
                <tr>
                    <td scope="row">{{$type->id}}</td>
                    <td><img width="100%" src="/storage/assets/image/pettypes/{{$type->image}}"></td>
                    <td>{{$type->name}}</td>
                    <td>{{$type->description}}</td>
                    <td>
                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$type->id}}">
                            <i class="fas fa-user-edit"></i> Edit
                        </a>
                        {!!Form::open(['action' => ['PetTypeController@destroy', $type->id], 'method' => 'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}

                        {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                        {!!Form::close()!!}
                    </td>
                    <!--Modal Edit body-->
                    <div class="modal fade" id="edit{{$type->id}}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">EDIT</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    {!! Form::open(['action'=> ['PetTypeController@update', $type->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                    <div class="form-group">
                                        {{Form::label('name', 'Category Type')}}
                                        {{Form::text('name', $type->name, ['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
                                    </div>
                                    <div class="form-group">
                                        {{Form::label('description', 'Description')}}
                                        {{Form::text('description', $type->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
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
                <th>Description</th>
                <th>Actions</th>
            </tr>
            </tfoot>
        </table>

    </div>
    <!-- /.card-body -->

    <!-- Modal CREATE -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Type</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=> 'PetTypeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Animal Type')}}
                        {{Form::text('name', ' ', ['class' => 'form-control', 'placeholder' => 'Animal Type'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('description', 'Description')}}
                        {{Form::text('description', ' ', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>


@endsection
