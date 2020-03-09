@extends('layouts.website')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('includes.error')
        <div class="row">
            <div class="col-md-3 mt-5">

                <!-- Profile Image -->
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="assets/images/{{Auth::user()->image}}"
                                 alt="Profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}'s Pets</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
                            <strong><i class="fas fa-dog mr-1"></i> Add New Pet</strong>
                        </button>
                        @foreach($Pet as $profile)
                            @if(Auth::user()->id == $profile->user_id)
                        <hr>
                        <p class="text-muted text-center">
                                <img class="profile-user-img img-fluid img-circle" style="width:150px; height: 150px;"
                                 src="assets/images/{{Auth::user()->image}}" alt="Profile picture">
                        </p>
                                <a href="#" data-toggle="modal" data-target="#pet{{$profile->id}}">
                                    <h5 class="text-center" >{{$profile->name}}</h5>
                                </a>
                            @endif
                                <div class="modal fade" id="pet{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Hello
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        @endforeach
                        <hr>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9 mt-5">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Activities
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Appointments Schedule
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Purchased History
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Medical History
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                @foreach($Patients as $r)
                                <!-- Button trigger modal -->
                                @if(Auth::user()->id == $r->user_id)
                                <a href="#" data-toggle="modal" data-target="#edit{{$r->user_id}}">
                                    <p class="text-muted text-justify">{{$r->pet_name}} is examined lasted {{$r->created_at}}</p>
                                </a>
<hr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="edit{{$r->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <b>Patient's Number:</b>
                                                        <p>{{$r->id}}</p>
                                                        <b>Patient's Name:</b>
                                                        <p>{{$r->pet_name}}</p>
                                                        @if(!empty($r->diagnosis))
                                                            <b>Diagnoses:</b>
                                                            @foreach($r->diagnosis as $diagnosis)
                                                                <p>{{$diagnosis->diagnosis}}</p> attended by <p>{{$diagnosis->doctor_attended}}</p>
                                                            @endforeach
                                                        @else
                                                            <p>No Diagnose</p>
                                                        @endif
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @endforeach
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Pet</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(['action'=> 'PetProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('', 'Owner Name')}}
                    <select name="owner" class="form-control">
                        <option value="{{ Auth::user()->id }}}">{{ Auth::user()->name }}</option>
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('name', 'Pet Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
                </div>
                <div class="form-group">
                    {{Form::label('', 'Animal Type')}}
                    <select name="animal_type" class = 'form-control'>
                        @foreach ($PetType as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {{Form::label('', 'Breed')}}
                    {{Form::text('breed', '', ['class' => 'form-control', 'placeholder' => ''])}}
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Gender</label>
                    <div class="form-group">
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="Male">
                            <label for="customRadio1" class="custom-control-label">Male</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="Female">
                            <label for="customRadio2" class="custom-control-label">Female</label>
                        </div>
                    </div>
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
