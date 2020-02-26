@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Diagnosis</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Diagnosis</li>
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
                    <h3 class="card-title"><i class="fas fa-user-injured"></i>&nbsp;Patient Diagnosis</h3>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    {!! Form::open(['action'=> 'DiagnosisController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="row">
                        <div class="col-3">
                            <label for="patient_id">Patient Name</label>
                            <select name="patient_id" class="form-control">
                                <option>Whose your patient</option>
                                @foreach ($Patients as $p)
                                    <option value="{{$p->id}}">{{$p->pet_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label for="diagnosis">Diagnosis</label>
                            <input type="text" class="form-control" placeholder="Write your diagnosis" name="diagnosis">
                        </div>
                        <div class="col-5">
                            <label for="doctor_attended">Doctor's Name</label>
                            <select name="doctor_attended" class="form-control">
                                <option>Choose your Doctor</option>
                                @foreach ($Doctors as $d)
                                    <option value="{{$d->id}}">{{$d->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="complaints">Complaints</label>
                            <input name="complaints" type="text" class="form-control" placeholder="Write your complaints">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="labresults">Lab Result</label>
                            <br>
                            {{Form::file('image')}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        {{Form::submit('Create Diagnosis', ['class'=>'btn btn-success'])}}
                        {!! Form::close() !!}
                    </div>
                </div>
                </div><!-- /.card-body -->
            </div>
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
                            <th class="th-lg">Patient Name</th>
                            <td class="th-lg"><b>Doctor Attended</b></td>
                            <th class="th-lg">Diagnosis</th>
                            <th class="th-lg">Complaints</th>
                            <th class="th-lg">Lab Result</th>
                        </tr>
                        </thead>
                        <!--Table head-->
                        <!--Table body-->
                        <tbody>
                        @foreach($Diagnosis as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->patient_id}}</td>
                                <td>{{$item->doctor_attended}}</td>
                                <td>{{$item->diagnosis}}</td>
                                <td>{{$item->complaints}}</td>
                                <td>{{$item->labresults}}</td>
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
