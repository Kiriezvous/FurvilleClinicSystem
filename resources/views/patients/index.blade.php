@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Patients Profile</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Patient Profile</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user-injured"></i>&nbsp;Patient</h3>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    {!! Form::open(['action'=> 'PatientController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-3">
                            <label>Animal Type</label>
                            <select name="animalType" class="form-control">
                                <option name="default">Choose an animal type</option>
                                @foreach ($PetType as $pet)
                                    <option value="{{$pet->id}}">{{$pet->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="exampleInputEmail1">Pet Name</label>
                            <input type="text" class="form-control" placeholder="Pet's Name" name="pet_name">
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Owner's Name</label>
                            <select name="owner" class="form-control">
                                <option name="default">Pet's Owner</option>
                                @foreach ($User as $owner)
                                    <option value="{{$owner->id}}">{{$owner->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-3">
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
                        <div class="col-4">
                            <label for="exampleInputEmail1">Blood Type</label>
                            <select name="bloodType" class = 'form-control'>
                                <option name="default">Choose a blood type</option>
                                @foreach ($BloodTypes as $blood)
                                    <option value="{{$blood->id}}">{{$blood->blood_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-5">
                            <label for="exampleInputEmail1">Weight</label>
                            <input name="weight" type="text" class="form-control" placeholder="Pet's Weight">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <label for="exampleInputEmail1">Height</label>
                            <input name="height" type="text" class="form-control" placeholder="Pet's Height">
                        </div>
                        <div class="col-6">
                            {{Form::file('image')}}
                        </div>
                    </div>
                </div><!-- /.card-body -->
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-10">
                        </div>
                        <div class="col-md-2">
                            {{Form::submit('Create Patient', ['class'=>'btn btn-success'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Patient's Table</h3>
                    <div class="card-tools">
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <table id="datatable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th class="th-lg">Image</th>
                            <td class="th-lg"><b>Type</b></td>
                            <th class="th-lg">Pet's Name</th>
                            <th class="th-lg">Owner's Name</th>
                            <th class="th-lg">Gender</th>
                            <th class="th-lg">Blood Type</th>
                            <th class="th-lg">Weight</th>
                            <th class="th-lg">Height</th>
                            <td class="th-lg"><b>Actions</b></td>
                        </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        @foreach($Patients as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td><img width="100%" src="assets/images/patients/{{$item->image}}"></td>
                                <td>{{$item->pettype->name}}</td>
                                <td>{{$item->pet_name}}</td>
                                <td>{{$item->users->name}}</td>
                                <td>{{$item->gender}}</td>
                                <td>{{$item->bloodtypes->blood_type}}</td>
                                <td>{{$item->weight}}</td>
                                <td>{{$item->height}}</td>
                                <td>
                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$item->id}}">
                                        <i class="fas fa-user-edit"></i>Edit
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
                                                {!! Form::open(['action'=> ['PatientController@update', $item->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-group">
                                                    {{Form::label('pet_name', 'Pet Name')}}
                                                    {{Form::text('pet_name', $item->pet_name,['class' => 'form-control', 'placeholder' => 'Pet Name'])}}

                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('', 'Animal Type')}}
                                                    <select name="animalType" class="form-control">
                                                        <option selected value="{{$item->pettype->id}}">{{$item->pettype->name}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('', 'Owner Name')}}
                                                    <select name="owner" class="form-control">
                                                        <option selected value="{{$item->users->id}}">{{$item->users->name}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="gender1">Gender</label>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio3" name="gender1" value="@if($item->gender === "Male") @endif">
                                                        <label for="customRadio3" class="custom-control-label">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input class="custom-control-input" type="radio" id="customRadio4" name="gender1" value="@if($item->gender === "Female") @endif">
                                                        <label for="customRadio4" class="custom-control-label">Female</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('', 'Blood Type')}}
                                                    <select name="bloodType" class="form-control">
                                                        <option selected value="{{$item->bloodtypes->id}}">{{$item->bloodtypes->blood_type}}</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('weight', 'Weight')}}
                                                    {{Form::text('weight', $item->weight, ['class' => 'form-control', 'placeholder' => 'Weight'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('height', 'Height')}}
                                                    {{Form::text('height', $item->height, ['class' => 'form-control', 'placeholder' => 'Height'])}}
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
                Import Export Patients Record
            </div>
            <div class="card-body">
                <form action="{{ route('Patientsimport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                    </div>
                    <br>
                    <button class="btn btn-success">Import Patients Data</button>
                    <a class="btn btn-warning" href="{{ route('Patientsexport') }}">Export Patients Data</a>
                </form>

            </div>
        </div>
    </div>


@endsection
