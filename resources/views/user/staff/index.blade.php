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
                            <h3><i class="fas fa-user-nurse"></i>&nbsp;{{count($listStaff)}}&nbsp;Staff</h3>
                        </div>
                        <div class="card-footer border-success">
                            <div style="text-align: center;">

                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#staffModal">
                                    <div class="small-box-footer">New Staff <i class="fas fa-arrow-circle-right"></i></div>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Staff Employees</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="staffTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
                <!--Table head-->
                <!--Table body-->
                <tbody>
                @foreach($listStaff as $staff)
                    <tr>
                        <td>{{$staff->id}}</td>
                        <td><img width="100px" height="100px" src="assets/images/staff/{{$staff->image}}"></td>
                        <td>{{$staff->name}}</td>
                        <td>{{$staff->email}}</td>
                        <td>
                            @if($staff->status == '1')
                                <a href="{{route('employees.edit', $staff->id)}}">
                                    <span class="badge badge-pill badge-success">Active</span>
                                </a>
                            @else
                                <a href="{{route('employees.edit', $staff->id)}}">
                                    <span class="badge badge-pill badge-danger">Disable</span>
                                </a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <!--Table body-->
            </table>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->

    {{-- Modal--}}
    <div class="modal fade" id="staffModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md"></i>&nbsp; Staff</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    {!! Form::open(['action'=> 'User\StaffController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="card bg-light mt-3">
            <div class="card-header">
                Import Export Doctors Record
            </div>
            <div class="card-body">
                <form action="{{ route('Staffimport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success">Import Staff Data</button>
                    <a class="btn btn-warning" href="{{ route('Staffexport') }}">Export Staff Data</a>
                </form>
            </div>
            </div>
        </div>
@endsection
