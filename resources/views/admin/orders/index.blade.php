@extends('layouts.master')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customers Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Orders</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.card-header -->
    <div class="card-body">

        <table id="datatable" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th class="th-lg">Client's Name</th>
                <th class="th-lg">Receiver's Name</th>
                <th class="th-lg">Product Orders</th>
                <th class="th-lg">Address</th>
                <th class="th-lg">Contact Number</th>
                <th class="th-lg">Status</th>
                <th class="th-lg">Actions</th>
            </tr>
            </thead>
            <!--Table head-->
            <!--Table body-->
            @foreach($Orders as $order)
            <tbody>

                <td>{{$order->id}}</td>
                <td>{{$order->user_id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->count}}</td>
                <td>{{$order->address}}</td>
                <td>{{$order->phone}}</td>
                <td>
                    @if($order->status == 'Pending')
                            <span class="badge badge-pill badge-warning">Pending</span>
                        @elseif($order->status == 'Confirmed')
                            <span class="badge badge-pill badge-success">Confirmed</span>
                            @elseif($order->status == 'Delivery')
                            <span class="badge badge-pill badge-primary">Completed</span>
                                @else
                                <span class="badge badge-pill badge-danger">Returned</span>
                    @endif
                </td>
                <td>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Change Status
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            @if($order->status == 'Pending')
                                <a class="dropdown-item" href="{{route('orders.edit', $order->id)}}">
                                    Confirmed
                                </a>
                            @elseif($order->status == 'Confirmed')
                                <a class="dropdown-item"  href="{{route('orders.edit', $order->id)}}">
                                    Delivery
                                </a>
                            @elseif($order->status == 'Delivery')
                                <a class="dropdown-item"  href="{{route('orders.edit', $order->id)}}">
                                    Completed
                                </a>
                            @elseif($order->status == 'Completed')
                                <a class="dropdown-item"  href="{{route('orders.edit', $order->id)}}">
                                    Returned
                                </a>
                            @else
                                <p class="text-center">Order completed</p>
                            @endif
                        </div>

                    </div>
                </td>

            </tbody>
            @endforeach
        </table>
    </div>
@endsection
