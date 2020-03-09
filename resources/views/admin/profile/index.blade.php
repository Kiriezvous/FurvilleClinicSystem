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
                    <div class="col-md-3">
                        <!-- Profile Image -->
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                         src="assets/images/doctors/noimage.jpg">
                                </div>
                            </div>
                    </div>
                                <div class="col-md-9">
                                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                                    <h4><p class="text-muted text-center">ADMIN</p></h4>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Status</b> <span class="badge badge-pill badge-success float-right">Active</span>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Started </b> <a class="float-right">{{Auth::user()->created_at}}</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

            </div><!-- /.card-body -->
            <div class="card-footer">
                <a href="#" class="btn btn-primary btn-block"><b>Update Profile</b></a>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
