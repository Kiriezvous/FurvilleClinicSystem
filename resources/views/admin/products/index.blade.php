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
                            <li class="breadcrumb-item active">Products</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Add Product
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="th-lg">Image</th>
                            <th class="th-lg">Product Name</th>
                            <th class="th-lg">Quantity</th>
                            <th class="th-lg">Category Type</th>
                            <th class="th-lg">Description</th>
                            <th class="th-lg">Price</th>
                            <th class="th-lg">Actions</th>
                        </tr>
                        </thead>
                        <!--Table head-->
                            <!--Table body-->
                                <tbody>
                                @foreach($Products as $item)
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td><img width="200px" height="200px" src="/assets/images/{{$item->image}}"></td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_quantity}}</td>
                                    <td>{{$item->product->category_type}}</td>
                                    <td>{{$item->product_description}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$item->id}}">
                                            <i class="fas fa-edit"></i>Edit
                                        </a>

                                        <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#delete{{$item->id}}">
                                            <i class="fas fa-trash"></i>
                                            Delete
                                        </a>

                                    </td>
                                    <!--Modal Edit body-->
                                    <div class="modal fade" id="edit{{$item->id}}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">EDIT</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {!! Form::open(['action'=> ['Admin\ProductsController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                    <div class="form-group">
                                                        {{Form::label('product_name', 'Product Name')}}
                                                        {{Form::text('product_name', $item->product_name, ['class' => 'form-control', 'placeholder' => 'Product Name'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('', 'Category Type')}}
                                                        <select name="category" class="form-control">
                                                            <option selected value="{{$item->product->id}}">{{$item->product->category_type}}</option>
                                                            <optgroup label="Categories">
                                                                @foreach ($Categories as $category)
                                                                <option value="{{$category->id}}">{{$category->category_type}}</option>
                                                            @endforeach
                                                            </optgroup>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('product_quantity', 'Quantity')}}
                                                        {{Form::text('product_quantity', $item->product_quantity, ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('product_description', 'Description')}}
                                                        {{Form::text('product_description', $item->product_description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
                                                    </div>
                                                    <div class="form-group">
                                                        {{Form::label('product_price', 'Price')}}
                                                        {{Form::text('product_price', $item->product_price, ['class' => 'form-control', 'placeholder' => 'Price'])}}
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

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="delete{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <h1 class="text-center">Are you sure you want to delete <p style=" color: red;">{{$item->product_name}}</p>?</h1>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                    {!!Form::open(['action' => ['Admin\ProductsController@destroy', $item->id], 'method' => 'POST'])!!}
                                                    {{Form::hidden('_method', 'DELETE')}}

                                                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                                                    {!!Form::close()!!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                                @endforeach
                                </tbody>
                                <!--Table body-->
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

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
                        {!! Form::open(['action'=> 'Admin\ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('product_name', 'Product Name')}}
                            {{Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Product Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('', 'Category Type')}}
                            <select name="category" class = 'form-control'>
                                <option name="default">---- SELECT CATEGORY TYPE ----</option>
                                @foreach ($Categories as $Categories)
                                    <option value="{{$Categories->id}}">{{$Categories->category_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {{Form::label('product_quantity', 'Quantity')}}
                            {{Form::text('product_quantity', '', ['class' => 'form-control', 'placeholder' => 'Quantity'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('product_description', 'Description')}}
                            {{Form::text('product_description', '', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('product_price', 'Price')}}
                            {{Form::text('product_price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
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

