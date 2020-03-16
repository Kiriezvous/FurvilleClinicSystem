<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Furville Clinic</title>
    <!-- Tell the browser to be responsive to screen width -->
    {{-- <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Admin -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Date Picker -->
    <link rel="stylesheet" href="/jquery.datetimepicker.css">
    <link rel="stylesheet" href="/css/website.css">

    <!-- Popup Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">

    <!-- Chartist js-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
    <script src="https://cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

    <link href='{{asset ('assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet'  />
    <link href='{{asset ('assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />
    <link href='{{asset ('assets/fullcalendar/css/style.css') }}' rel='stylesheet' />

</head>
<body>
<header>
    <section id="nav-bar">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="/home"><img src="/img/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('Home')}}"><b style="color:white;">HOME</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('About')}}"><b style="color:white;">ABOUT</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('Service')}}"><b style="color:white;">SERVICES</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('appointment.create')}}"><b style="color:white;">APPOINTMENT</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('Gallery')}}"><b style="color:white;">GALLERY</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href=""><b style="color:white;">BREEDS</b></a></h5>
                    </li>
                    <li class="nav-item">
                        <h5><a class="nav-link" href="{{route('ShoppingCart')}}"><b style="color:white;">SHOP</b></a></h5>
                    </li>
                </ul>

                @if (Route::has('login'))
                    <div class="top-right links mr-3">
                        @auth
                            {{--{{route('cart.index')}}--}}
                            <div class="navbar">
                                <a href="{{route('cart.index')}}">
                                    <h5>
                                    <span class="nav-item fas fa-cart-plus right badge badge-warning mr-2">
                                        Cart
                                        @if(Cart::instance('default')->count() > 0)
                                            : {{Cart::instance('default')->count()}}
                                        @endif
                                    </span>
                                    </h5>
                                </a>
                                <h5><a href="{{ url('profile') }}" style="color: white;"><b>Profile</b></a></h5>
                                <div class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                </div>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <button class="dropdown-item" type="button"><b>Setting</b></button>
                                    <a class="nav-link dropdown-item btn" href="">
                                        <i class="nav-icon fas fa-power-off"></i>

                                        <P>{{ __('Logout') }}</P>
                                    </a>
                                </div>
                            </div>
                        @else
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <h5><a href="{{ route('login') }}" style="color: white;"><b>Login</b></a></h5>
                                </li>
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <h5><a href="{{ route('register') }}" style="color: white;"><b>Register</b></a></h5>
                                    </li>
                                @endif
                            </ul>
                        @endauth
                    </div>
                @endif
            </div>
        </nav>
    </section>
</header>
<main role="main">
    <div class="modal fade" id="updateSchedule" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="titleModal">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            @include('includes.error')
            <div class="row">
                <div class="col-md-3 mt-5">

                    <!-- Profile Image -->
                    <div class="card card-warning card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                     src="assets/images/{{Auth::user()->image}}"
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

                            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#exampleModal">
                                <strong><i class="fas fa-dog mr-1"></i> Add New Pet</strong>
                            </button>
                            @foreach($Pet as $profile)
                                @if(Auth::user()->id == $profile->user_id)
                                    <hr>
                                    <p class="text-muted text-center">
                                        <img class="profile-user-img img-fluid img-circle" style="width:150px; height: 150px;"
                                             src="assets/images/{{Auth::user()->image}}" alt="Profile picture">
                                    </p>
                                    <a href="#" data-toggle="modal" data-target="#pet{{$profile->id}}">
                                        <h5 class="text-center" >{{$profile->name}}</h5>
                                    </a>
                                @endif
                                <div class="modal fade" id="pet{{$profile->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Hello
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <hr>
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
                                        <div id='external-events-list' class="mt-3"></div>
                                        <i class="fas fa-text-width"></i>
                                        Appointments Schedule
                                    </h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div id="calendar"></div>
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
                                @foreach($Patients as $r)
                                    <!-- Button trigger modal -->
                                        @if(Auth::user()->id == $r->user_id)
                                            <a href="#" data-toggle="modal" data-target="#edit{{$r->user_id}}">
                                                <p class="text-muted text-justify">{{$r->pet_name}} is examined lasted {{$r->created_at}}</p>
                                            </a>
                                            <hr>
                                            <!-- Modal -->
                                            <div class="modal fade" id="edit{{$r->user_id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <b>Patient's Number:</b>
                                                            <p>{{$r->id}}</p>
                                                            <b>Patient's Name:</b>
                                                            <p>{{$r->pet_name}}</p>
                                                            @if(!empty($r->diagnosis))
                                                                <b>Diagnoses:</b>
                                                                @foreach($r->diagnosis as $diagnosis)
                                                                    <p>{{$diagnosis->diagnosis}}</p> attended by <p>{{$diagnosis->doctor_attended}}</p>
                                                                @endforeach
                                                            @else
                                                                <p>No Diagnose</p>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
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

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New Pet</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {!! Form::open(['action'=> 'PetProfileController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="form-group">
                        {{Form::label('', 'Owner Name')}}
                        <select name="owner" class="form-control">
                            <option value="{{ Auth::user()->id }}}">{{ Auth::user()->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('name', 'Pet Name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                    <div class="form-group">
                        {{Form::label('', 'Animal Type')}}
                        <select name="animal_type" class = 'form-control'>
                            @foreach ($PetType as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        {{Form::label('', 'Breed')}}
                        {{Form::text('breed', '', ['class' => 'form-control', 'placeholder' => ''])}}
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Gender</label>
                        <div class="form-group">
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio1" name="gender" value="Male">
                                <label for="customRadio1" class="custom-control-label">Male</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input class="custom-control-input" type="radio" id="customRadio2" name="gender" value="Female">
                                <label for="customRadio2" class="custom-control-label">Female</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        {{Form::file('image')}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    {{Form::submit('Submit', ['class'=>'btn btn-success'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- FOOTER -->
    <footer class="container mt-3 sticky-bottom">

        <p class="float-right"><a href="#">Back to top</a></p>
        <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>

    </footer>
</main>
<script src="/js/app.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
{{--<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>--}}
{{--<script src="../../assets/js/vendor/popper.min.js"></script>--}}
{{--<script src="../../dist/js/bootstrap.min.js"></script>--}}
{{--<!-- Just to make our placeholder images work. Don't actually copy the next line! -->--}}
{{--<script src="../../assets/js/vendor/holder.min.js"></script>'--}}
{{--<script src="/js/bootstrap-datetimepicker.js"></script>--}}
{{--<script src="/js/moment-with-locale.js"></script>--}}


<script src='{{asset ('assets/fullcalendar/packages/core/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/interaction/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/daygrid/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/timegrid/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/list/main.js') }}'></script>
<script src='{{asset ('assets/fullcalendar/packages/core/locales-all.js') }}'></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var Calendar = FullCalendar.Calendar;
        var Draggable = FullCalendarInteraction.Draggable

        /* initialize the external events
        -----------------------------------------------------------------*/

        var containerEl = document.getElementById('external-events-list');
        new Draggable(containerEl, {
            itemSelector: '.fc-event',
            eventData: function(eventEl) {
                return {
                    title: eventEl.innerText.trim()
                }
            }
        });

        /* initialize the calendar
        -----------------------------------------------------------------*/

        var calendarEl = document.getElementById('calendar');
        var calendar = new Calendar(calendarEl, {
            plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
            },
            locales: 'pt-br',
            navlinks: true,
            eventLimit: true,
            editable: true,
            eventClick: function(event) {
                $("updateSchedule").modal("show");
            },

            select: function(event){
                // day_last_clicked = $(this);
                current_date = date('y/m/d');
                alert(current_date);
            },
            events:
                [
                        @foreach($Events as $event)
                    {
                        @if(Auth::user()->name == $event->title)
                        "title": "You have an appointment @if($event->color == "lightgreen") Check up @elseif($event->color == "lightblue") Grooming @else Other Service @endif in the clinic, please be on time",
                        "start": "{{$event->start}}",
                        "end": "{{$event->end}}",
                        "color": "{{$event->color}}",
                        @endif
                    },
                    @endforeach
                ]
        });

        calendar.render();
    });
</script>
</body>
</html>
