@extends('layouts.master')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card card-success card-outline">
                <div class="card-header">
                    <h3 class="card-title"><i class="fas fa-user"></i>&nbsp;Walk-in Appointment</h3>
                </div> <!-- /.card-body -->
                <div class="card-body">
                    <table id="datatable" class="table table-bordered table-striped">
                        <h1>Walk-in Appointments</h1>
                        {!! Form::open(['action'=> 'Admin\EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Client Name')}}
                            {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start Date')}}
                            <input name="start" type="datetime-local" id="start" class="form-control">
                        </div>
                        <div class="form-group">
                            {{Form::label('end', 'End Date')}}
                            <input name="end" type="datetime-local" id="end" class="form-control">
                        </div>
                        <div class="form-group">
                            {{Form::label('color', 'Service Type')}}
                            <select name="color" class="form-control">
                                <option value="lightgreen">Check Up</option>
                                <option value="lightblue">Grooming</option>
                                <option value="yellow">Other Services</option>
                            </select>
                        </div>
                        <div class="card-footer">
                            {{Form::submit('Submit', ['class'=>'btn btn-success float-right'])}}
                            {!! Form::close() !!}
                        </div>

                    </table>
                </div><!-- /.card-body -->
        </div><!-- /.container-fluid -->
        </div>
    </section>
    <!-- /.content -->

@endsection
