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
    <div class="row ml-2 mr-2">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>

                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <a href="/products/create" class="btn btn-success">Add Product</a>
                        </div>


                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
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
                    @if(count($Products)> 0)
                        @foreach($Products as $item)
                            <!--Table body-->
                                <tbody>
                                <tr>
                                    <th scope="row">{{$item->id}}</th>
                                    <td><img width="100%" src="/storage/assets/image/products/{{$item->image}}"></td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_quantity}}</td>
                                    {{-- Need to change category_id (id) to (category_type) using Model --}}
                                    <td>{{$item->categories->category_type}}</td>
                                    <td>{{$item->product_description}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td><a href="/products/{{$item->id}}/edit" class="btn btn-info">Edit</a></td>
                                    <td>
                                        {!!Form::open(['action' => ['ProductsController@destroy', $item->id], 'method' => 'POST'])!!}

                                        {{Form::hidden('_method', 'DELETE')}}
                                        {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}

                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                                </tbody>
                                <!--Table body-->
                            @endforeach

                        @else
                            <h5>No item found</h5>
                        @endif
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

@endsection

