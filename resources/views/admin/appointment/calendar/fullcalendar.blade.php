<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<link rel="stylesheet" href="/css/app.css">
<link href='{{asset ('assets/fullcalendar/packages/core/main.css') }}' rel='stylesheet'  />
<link href='{{asset ('assets/fullcalendar/packages/daygrid/main.css') }}' rel='stylesheet' />
<link href='{{asset ('assets/fullcalendar/packages/timegrid/main.css') }}' rel='stylesheet' />
<link href='{{asset ('assets/fullcalendar/packages/list/main.css') }}' rel='stylesheet' />
<link href='{{asset ('assets/fullcalendar/css/style.css') }}' rel='stylesheet' />
<style>

  #calendar {
    float: right;
    width: 100%;
  }
    </style>
</head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">

          <!-- Navbar -->
          @include('admin.includes.navbar')
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          @include('admin.includes.sidebar')


            <div class="modal fade" id="editAppointment" tabindex="-1" role="dialog" aria-labelledby="titleModal" aria-hidden="true">
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

          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
              <div class="container-fluid">
                <div class="row mb-2">
                  <div class="col-sm-6">
                    <h1 class="m-0 text-dark">View Calendar</h1>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                  </div><!-- /.col -->
                </div><!-- /.row -->
              </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                @include('admin.includes.error')
              <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Service Type</h3>
                                    <div id='external-events-list' class="mt-3">
                                        <div class="bg-success btn-lg">Check Up</div>
                                        <div class="bg-primary btn-lg">Grooming</div>
                                        <div class="bg-warning btn-lg">Other Services</div>
                                    </div>
                                </div>
                                <div class="card-body" data-toggle="modal" data-target="#exampleModal">
                                    <button type="button" class="btn btn-block btn-outline-dark btn-lg">New Schedule</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body">
                            <div id="calendar"></div>
                            </div>
                        </div>
                    </div>

                </div>
              </div>
        </section>
                </div>

          <!-- Main Footer -->
          <footer class="main-footer">
             <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
              Anything you want
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
          </footer>
        </div>
        <!-- ./wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Clinic Event Schedule</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['action'=> 'Admin\EventController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="form-group">
                            {{Form::label('title', 'Client Name')}}
                            {{Form::text('title', ' ', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('start', 'Start Date')}}
                            <input name="start" type="datetime-local" id="start" class="form-control">
                        </div>
{{--                        <div class="form-group">--}}
{{--                            {{Form::label('end', 'End Date')}}--}}
{{--                            <input name="end" type="datetime-local" id="end" class="form-control">--}}
{{--                        </div>--}}
                        <div class="form-group">
                            {{Form::label('color', 'Service Type')}}
                            <select name="color" class="form-control">
                                <option value="lightgreen">Check Up</option>
                                <option value="lightblue">Grooming</option>
                                <option value="yellow">Other Services</option>
                            </select>
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

      <!-- jQuery -->
      <script src="/js/app.js"></script>

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
        eventClick: function(event){
          $("#editAppointment").modal('show');
        },

        select: function(event){
            // day_last_clicked = $(this);
            current_date = date('y/m/d');
            alert(current_date);
        },
        events:
        [
          @foreach($events as $event)
          {
            "title": "{{ $event->title }}",
            "start": "{{ $event->start }}",
            "end": "{{ $event->end }}",
            "color" : "{{ $event->color}}",
          },
          @endforeach
        ]
      });

      calendar.render();
    });
</script>
</body>
</html>


