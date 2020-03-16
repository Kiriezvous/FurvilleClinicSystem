@extends('layouts.master')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>User Profile</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">User Profile</li>
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
                <h3 class="card-title"><i class="fas fa-user"></i>&nbsp;Profile</h3>
            </div> <!-- /.card-body -->
            <div class="card-body">
                <div class="row">
                    @foreach($Admin as $profile)
                        @if(Auth::user()->id == $profile->id)
                    <div class="col-md-3">
                        <!-- Profile Image -->
                            <div class="card-body box-profile">
                                <div class="text-center">
{{--                                    <img class="profile-user-img img-fluid img-circle" src="assets/images/{{$prod->image}}">--}}
                                    <img src="/assets/images/{{$profile->image}}" alt="">
                                </div>
                            </div>
                    </div>
                                <div class="col-md-9">
                                <h3 class="profile-username text-center"></h3>

                                    <h4><p class="text-center">{{$profile->name}}</p></h4>
                                    <h4><p class="text-muted text-center">ADMIN</p></h4>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Status</b> <span class="badge badge-pill badge-success float-right">Active</span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{$profile->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Started </b> <a class="float-right">{{$profile->created_at}}</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

            </div><!-- /.card-body -->
            <div class="card-footer">
                <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#exampleModal">
                    Update Profile Picture
                </button>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Upload Photo</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['action'=> ['Admin\ProfileController@update', $profile->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                <label for="image">Profile Picture</label><br>
                                {{Form::file('image')}}
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
