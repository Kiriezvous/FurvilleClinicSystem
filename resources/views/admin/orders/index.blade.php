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
                <th class="th-lg">Proof Image</th>
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
                            <span class="badge badge-pill badge-primary">Delivery</span>
                                @elseif($order->status == "Returned")
                                <span class="badge badge-pill badge-danger">Returned</span>
                                    @elseif($order->status == "Completed")
                                    <span class="badge badge-pill badge-info">Completed</span>
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
                                    Returned
                                </a>
                            @elseif($order->status == 'Returned')
                                <a class="dropdown-item"  href="{{route('orders.edit', $order->id)}}">
                                    Completed
                                </a>
                            @endif
                        </div>

                    </div>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment{{$order->id}}">
                        View
                    </button>
                </td>
            </tbody>
            @endforeach

            @foreach($Orders as $order)
                <!-- Modal -->
                <div class="modal fade" id="payment{{$order->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img id="img" class="img-fluid rounded mx-auto d-block" src="/assets/images/{{$order->proof_image}}" alt="Proof">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </table>
    </div>
@endsection
