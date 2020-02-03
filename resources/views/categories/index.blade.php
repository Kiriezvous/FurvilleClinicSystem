@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Inventories</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
<div class="card">
    <div class="card-header">
            <h3 class="card-title">Categories</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add Category
                </button>


            </div>
    </div>

    <!-- /.card-header -->
    <div class="card-body">

        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th class="th-lg">Category Type</th>
                <th class="th-lg">Description</th>
                <th class="th-lg">Actions</th>
            </tr>
            </thead>
            <!--Table head-->
        @if(count($posts)> 0)
                <!--Table body-->
                    <tbody>
                    @foreach($posts as $category)
                    <tr>
                        <td scope="row">{{$category->id}}</td>
                        <td>{{$category->category_type}}</td>
                        <td>{{$category->description}}</td>
                        <td>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$category->id}}">
                                <i class="fas fa-user-edit"></i>
                            </a>
                            <form method="DELETE" action="{{route('categories.destroy',  $category->id)}}"  accept-charset="UTF-8">
                                <button class="btn btn-danger" type="submit"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                        <!--Modal Edit body-->
                        <div class="modal fade" id="edit{{$category->id}}" tabindex="-1" role="dialog">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">EDIT</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        {!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                        <div class="form-group">
                                            {{Form::label('category_type', 'Category Type')}}
                                            {{Form::text('category_type', $category->category_type, ['class' => 'form-control', 'placeholder' => 'Category Type'])}}
                                        </div>
                                        <div class="form-group">
                                            {{Form::label('description', 'Description')}}
                                            {{Form::text('description', $category->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
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
                <th>Rendering engine</th>
                <th>Browser</th>
                <th>Platform(s)</th>
                <th>Engine version</th>
            </tr>
            </tfoot>
        </table>
        @else
            <p>No category found</p>
        @endif
    </div>
    <!-- /.card-body -->
</div>
<!-- /.card -->


<!-- Modal CREATE -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('category_type', 'Category Type')}}
                    {{Form::text('category_type', ' ', ['class' => 'form-control', 'placeholder' => 'Category Type'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::text('description', ' ', ['class' => 'form-control', 'placeholder' => 'Description'])}}
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

<!-- Modal EDIT -->

@endsection
