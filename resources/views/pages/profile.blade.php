@extends('layouts.website')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 mt-5">

                <!-- Profile Image -->
                <div class="card card-warning card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <img class="profile-user-img img-fluid img-circle"
                                 src="../../dist/img/user4-128x128.jpg"
                                 alt="Profile picture">
                        </div>

                        <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

                        <p class="text-muted text-center">{{ Auth::user()->email }}</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <!-- About Me Box -->
                <div class="card card-warning">
                    <div class="card-header">
                        <h3 class="card-title">{{ Auth::user()->name }}'s Pets</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <strong><i class="fas fa-book mr-1"></i> Education</strong>

                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                        <p class="text-muted">
                            <span class="tag tag-danger">UI Design</span>
                            <span class="tag tag-success">Coding</span>
                            <span class="tag tag-info">Javascript</span>
                            <span class="tag tag-warning">PHP</span>
                            <span class="tag tag-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9 mt-5">
                <div class="card card-warning card-outline">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-text-width"></i>
                            Activities
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Appointments Schedule
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Purchased History
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-text-width"></i>
                                    Medical History
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->



            </div>

        </div>
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

@endsection
