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
                        {!! Form::open(['action'=> 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Client Name')}}
                            {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start Date')}}
                            {{Form::text('start', ' ', ['class' => 'form-control filthypillow', 'placeholder' => 'Start Date', 'id'=>'start'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('end', 'End Date')}}
                            {{Form::text('end', ' ', ['class' => 'form-control filthypillow', 'placeholder' => 'Pick', 'id' => 'end'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('color', 'Service Type')}}
                            {{Form::text('color', ' ', ['class' => 'form-control', 'placeholder' => 'Pick a Color'])}}
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
