@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Records</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Patient Records</li>
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
                    <h3 class="card-title">Patient's Records Table</h3>
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
                            <th class="th-lg">Pet's Name</th>
                            <th class="th-lg">Owner's Name</th>
                            <th class="th-lg">Actions</th>
                        </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        @foreach($Patients as $r)
                            <tr>
                                <td>{{$r->id}}</td>
                                <td><img width="100px" src="assets/images/patients/{{$r->image}}"></td>
                                <td>{{$r->pet_name}}</td>
                                <td>{{$r->users->name}}</td>

                                <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$r->id}}">
                                        View
                                    </button>
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal fade" id="edit{{$r->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Patient's Record</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <img width="100%" src="assets/images/patients/{{$r->image}}">
                                                </div>
                                                <div class="col-md-6">
                                                    <b>Patient's Number:</b>
                                                    <p>{{$r->id}}</p>
                                                    <b>Patient's Name:</b>
                                                    <p>{{$r->pet_name}}</p>
                                                    @if(!empty($r->diagnosis))
                                                        <b>Diagnoses:</b>
                                                        @foreach($r->diagnosis as $diagnosis)
                                                            <p>{{$diagnosis->diagnosis}}</p>
                                                        @endforeach
                                                    @else
                                                        <p>No Diagnose</p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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

@endsection
