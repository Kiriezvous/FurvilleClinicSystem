@extends('layouts.master')

@section('content')

        <div class="card-body table-responsive">
            <table id="datatable" class="table table-bordered table-striped">
    <a href="/appointment" class="btn btn-info">Go Back</a>
    <h1>Walk-in Appointments</h1>
    {!! Form::open(['action'=> 'EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('title', 'Client Name')}}
        {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>

    <div class="form-group">
        {{Form::label('start', 'Start Date')}}
        {{Form::text('start', ' ', ['class' => 'form-control', 'placeholder' => 'Start Date', 'id'=>'start'])}}
    </div>
    <div class="form-group">
        {{Form::label('end', 'End Date')}}
        {{Form::text('end', ' ', ['class' => 'form-control', 'placeholder' => 'Pick', 'id' => 'end'])}}
    </div>

{{--    <div class="form-group">--}}
{{--        {{Form::label('description', 'Description')}}--}}
{{--        {{Form::text('description', ' ', ['class' => 'form-control', 'placeholder' => 'Description'])}}--}}
{{--    </div>--}}
    <div class="form-group">
        {{Form::label('color', 'Service Type')}}
        {{Form::text('color', ' ', ['class' => 'form-control', 'placeholder' => 'Pick a Color'])}}
    </div>
    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
    {!! Form::close() !!}
            </table>
        </div>


    <script>
        $('#start').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'y-m-1 H:i',
            onShow: function(ct){
                this.setOptions({
                    maxDate: $('#end').val() ? $('#end').val : false
                })
            }
        })
        $('#end').datetimepicker({
            timepicker: true,
            datepicker: true,
            format: 'y-m-1 H:i',
            onShow: function(ct){
                this.setOptions({
                    minDate: $('#start').val() ? $('#start').val : false
                })
            }
        })
    </script>
@endsection
