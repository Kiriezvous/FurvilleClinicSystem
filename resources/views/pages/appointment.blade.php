@extends('layouts.website')


@section('content')
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="/img/banner1.png" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="/img/banner2.jpg" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="/img/banner3.png" class="d-block w-100" alt="...">

            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>


    <div class="container mr-3 mt-5">

        <div class="row">
            <div class="col-md-10">
                @include('includes.error')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-text-width"></i>
                Appointment
            </h3>
        </div>
        <!-- /.card-header -->
                <div class="card-body table-responsive">
                    <div class="row">
                        <div class="col-md-6">
                    <table id="datatable" class="table table-bordered table-striped">
                        {!! Form::open(['action'=> 'ReserveController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Client Name')}}
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'User Name'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start Date')}}
                            <input name="start" type="datetime-local" id="start" class="form-control">
                        </div>
                        <div class="form-group">
                            {{Form::label('color', 'Service Type')}}
                            <select name="color" class="form-control">
                                <option value="lightgreen">Check Up</option>
                                <option value="lightblue">Grooming</option>
                                <option value="yellow">Other Services</option>
                            </select>
                        </div>
                        {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                        {!! Form::close() !!}
                    </table>
                        </div>
                        <div class="col-md-6">
                            <img src="/img/appointment.png" class="img-fluid">
                        </div>
                    </div>
                </div>
    </div>
    <!-- /.card -->
            </div>
        </div>
    </div>

@endsection

