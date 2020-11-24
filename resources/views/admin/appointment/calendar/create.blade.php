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
                        {!! Form::open(['action'=> 'Admin\EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Client Name')}}
                            {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start Date')}}
                            <input name="start" type="date" id="start" class="form-control">
                        </div>
                        <div class="form-group">
                            {{Form::label('time', 'Time slot')}}
                            <select name="time" class="form-control">
                                <option value="1">09:00 AM - 10:00 AM</option>
                                <option value="2">10:00 AM - 11:00 AM</option>
                                <option value="3">11:00 AM - 12:00 PM</option>
                                <option value="4">12:00 PM - 13:00 PM</option>
                                <option value="5">13:00 PM - 14:00 PM</option>
                                <option value="6">14:00 PM - 15:00 PM</option>
                                <option value="7">15:00 PM - 16:00 PM</option>
                                <option value="8">16:00 PM - 17:00 PM</option>
                                <option value="9">17:00 PM - 18:00 PM</option>
                            </select>
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
