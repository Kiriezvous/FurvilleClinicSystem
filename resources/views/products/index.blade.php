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
                                    <td><img width="100%" src="/assets/images/products/{{$item->image}}"></td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_quantity}}</td>
                                    <td>{{$item->product->category_type}}</td>
                                    <td>{{$item->product_description}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$item->id}}">
                                            <i class="fas fa-user-edit"></i>Edit
                                        </a>
                                        {!!Form::open(['action' => ['ProductsController@destroy', $item->id], 'method' => 'POST'])!!}
                                        {{Form::hidden('_method', 'DELETE')}}

                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                                        {!!Form::close()!!}
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
                                                    {!! Form::open(['action'=> ['ProductsController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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

        <div class="container">
            <div class="card bg-light mt-3">
                <div class="card-header">
                    Import Export Products
                </div>
                <div class="card-body">
                    <form action="{{ route('Productsimport') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-success">Import Products Data</button>
                        <a class="btn btn-warning" href="{{ route('Productsexport') }}">Export Products Data</a>
                    </form>

                </div>
            </div>
        </div>

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
                        {!! Form::open(['action'=> 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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

