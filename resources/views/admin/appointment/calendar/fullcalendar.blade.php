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
          @include('includes.navbar')
          <!-- /.navbar -->

          <!-- Main Sidebar Container -->
          @include('includes.sidebar')

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
              <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="sticky-top mb-3">
                            {{-- Card --}}
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Draggable Title</h4>
                                </div>
                                {{-- Body --}}
                                <div class="card-body" id="external-events">
                                    {{-- Event --}}
                                    <div id="external-events-list">
                                        <div class="fc-event external-event bg-success">Sample 1</div>
                                        <div class="fc-event external-event bg-warning">Sample 2</div>
                                        <div class="fc-event external-event bg-info">Sample 3</div>
                                        <div class="fc-event external-event bg-primary">Sample 4</div>
                                        <div class="fc-event external-event bg-danger">Sample 5</div>

                                        <div class="checkbox">
                                            <label for="drop-remove">
                                                <input type="checkbox" id="drop-remove">
                                                remofe after drop
                                            </label>
                                        </div>
                                    </div>
                                  {{-- End Event --}}
                                </div>
                                {{-- End Body --}}
                            </div>
                            {{-- End Card --}}
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Create Event</h3>
                                </div>
                                <div class="card-body" data-toggle="modal" data-target="#exampleModal">
                                    <button type="button" class="btn btn-block btn-primary btn-lg">New Schedule</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="card card-primary">
                            <div class="card-body">
                            <div id="calendar" data-route-load-events="{{ route('routeloadEvents') }}"></div>
                            {{-- {!! $calendar->calendar() !!}
                            {!! $calendar->script() !!} --}}
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
                        <div class="form-group">
                            {{Form::label('color', 'Service Type')}}
                            {{Form::text('color', ' ', ['class' => 'form-control', 'placeholder' => 'Pick a Color'])}}
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
      function routeEvents(route) {
        //alert('Hello');
        return document.getElementById('calendar').dataset[route];
      }
      </script>

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
        selectable: true,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar
        drop: function(arg) {
          // is the "remove after drop" checkbox checked?
          if (document.getElementById('drop-remove').checked) {
            // if so, remove the element from the "Draggable Events" list
            arg.draggedEl.parentNode.removeChild(arg.draggedEl);
          }
        },
        eventDrop: function(event){
          alert('Added');
        },
        eventClick: function(event){
          alert('Clicked');
        },
        eventResize: function(event){
          alert('Date Adjusted');
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
          },
          @endforeach
        ]
      });
      //console.log("Hello" + routeEvents('routeloadEvents'));
      calendar.render();
    });
</script>
</body>
</html>


