@extends('layouts.master')

@section('css')
    <script type="text/javascript" src="/filthypillow/libs/jquery.js"></script>
    <script type="text/javascript" src="/filthypillow/libs/moment.js"></script>
    <script type="text/javascript" src="/filthypillow/libs/jquery.filthypillow.js"></script>
    <link rel="stylesheet" type="text/css" href="/filthypillow/libs/jquery.filthypillow.css">
@endsection

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
                {{Form::text('start', ' ', ['class' => 'form-control filthypillow', 'placeholder' => 'Start Date', 'id'=>'start'])}}
            </div>
            <div class="form-group">
                {{Form::label('end', 'End Date')}}
                {{Form::text('end', ' ', ['class' => 'form-control filthypillow', 'placeholder' => 'Pick', 'id' => 'end'])}}
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
@endsection

@section('js')
    <script type="text/javascript">
        var $fp = $(".filthypillow"),
            now = moment().subtract("seconds", 1);

        $fp.filthypillow(
            /*{
            minDateTime: function( ) {
            return now;
            }
            }*/
        );
        $fp.on("focus", function () {
            $fp.filthypillow("show");
        });
        $fp.on("fp:save", function (e, dateObj) {
            $fp.val(dateObj.format("MMM DD YYYY hh:mm A"));
            $fp.filthypillow("hide");
        });
    </script>
@endsection
