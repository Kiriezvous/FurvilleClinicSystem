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
                    <h3><i class="fas fa-user-md"></i>&nbsp;{{count($listDoctor)}} Doctors</h3>
                </div>
                <div class="card-footer border-success">
                    <div style="text-align: center;">

                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#doctorModal">
                            <div class="small-box-footer">New Doctor <i class="fas fa-arrow-circle-right"></i></div>
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
            <h3 class="card-title">Doctor Employees</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="doctorTable" class="table table-bordered table-striped">
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
                    @foreach($listDoctor as $doctor)
                    <tr>
                        <td>{{$doctor->id}}</td>
                        <td><img width="100px" height="100px" src="assets/images/doctors/{{$doctor->image}}"></td>
                        <td>{{$doctor->name}}</td>
                        <td>{{$doctor->email}}</td>
                        <td>
                            @if($doctor->status == '1')
                                <a href="{{route('doctors.edit', $doctor->id)}}">
                                    <span class="badge badge-pill badge-success">Active</span>
                                </a>
                            @else
                                <a href="{{route('doctors.edit', $doctor->id)}}">
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
        <div class="modal fade" id="doctorModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-md"></i>&nbsp; Doctor</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <div class="modal-body">
                    {!! Form::open(['action'=> 'Admin\User\DoctorController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('name', 'Name')}}
                        {{Form::text('name', ' ', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('email', 'Email')}}
                        {{Form::text('email', ' ', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                    </div>
                        <div class="form-group">
                            <label for="password" class="col-form-label">{{ __('Password') }}</label>


                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror

                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-form-label">{{ __('Confirm Password') }}</label>


                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

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
