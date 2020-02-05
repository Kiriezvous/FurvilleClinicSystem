@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="container-fluid ml-4">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-4 mt-3 ml-3">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><i class="fas fa-user"></i>&nbsp;Customers</h3>
                        </div>
                        <div class="card-footer border-success">
                            <div style="text-align: center;">

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#customerModal">
                                    <div class="small-box-footer">New User <i class="fas fa-arrow-circle-right"></i></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<div class="card-body table-responsive">
    <!--Table-->
    <table id="datatable" class="table table-bordered table-striped">
        <!--Table head-->
        <thead>
        <tr>
            <th>#</th>
            <th class="th-lg">Name</th>
            <th class="th-lg">Email</th>
            <th class="th-lg">Status</th>
        </tr>
        </thead>
        <!--Table head-->

        <!--Table body-->
            <tbody>
            @foreach($client as $s)
            <tr>
                <th scope="row">{{$s->id}}</th>
                <td>{{$s->name}}</td>
                <td>{{$s->email}}</td>
                <td>
                    @if($s->status == '1')
                        <a href="{{route('clients.edit', $s->id)}}">
                        <span class="badge badge-pill badge-success">Active</span>
                        </a>
                    @else
                        <a href="{{route('clients.edit', $s->id)}}">
                            <span class="badge badge-pill badge-danger">Disable</span>
                        </a>
                    @endif
                </td>
            @endforeach
            </tbody>
            <!--Table body-->

    </table>
    <!--Table-->
</div>

    {{-- Modal--}}
    <div class="modal fade" id="customerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md"></i>&nbsp; Doctor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['action'=> 'User\ClientsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name', ' ', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', ' ', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('password', 'Password')}}
                        {{Form::password('password'. '', ['class'=>'form-control'])}}

                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
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
@endsection
