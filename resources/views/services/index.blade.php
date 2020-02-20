@extends('layouts.master')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Service</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- /.row -->
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Services</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            Add Service
                        </button>
                    </div>
                </div>

    <div class="card-body table-responsive">
        <!--Table-->
        <table id="datatable" class="table table-bordered table-striped">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th class="th-lg">Service Name</th>
              <th class="th-lg">Service Type</th>
              <th class="th-lg">Description</th>
              <th class="th-lg">Price</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          <!--Table body-->
          <tbody>
          @foreach($posts as $s)
            <tr>
              <th scope="row">{{$s->id}}</th>
              <td>{{$s->service_name}}</td>
              <td><img src="img/{{$s->service_type}}" width="100px"></td>
              <td>{{$s->service_description}}</td>
              <td>{{$s->service_price}}</td>
              <td>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$s->id}}">
                      <i class="fas fa-user-edit"></i>Edit
                  </a>
                  {!!Form::open(['action' => ['ServicesController@destroy', $s->id], 'method' => 'POST'])!!}
                  {{Form::hidden('_method', 'DELETE')}}

                  {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
                  {!!Form::close()!!}
            </td>
            </tr>
            @endforeach
          </tbody>
          <!--Table body-->
              <!-- Edit Product Modal -->
              <div class="modal fade" id="edit{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              {!! Form::open(['action'=> ['ServicesController@update', $s->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                              <div class="form-group">
                                  {{Form::label('service_name', 'Service Name')}}
                                  {{Form::text('service_name', $s->service_name, ['class' => 'form-control', 'placeholder' => 'Service Name'])}}
                              </div>
                              <div class="form-group">
                                  {{Form::label('service_description', 'Service Description')}}
                                  {{Form::text('service_description', $s->service_description, ['class' => 'form-control', 'placeholder' => 'Service Description'])}}
                              </div>
                              <div class="form-group">
                                  {{Form::label('service_type', 'Service Type')}}
                                  {{Form::text('service_type', $s->service_type, ['class' => 'form-control', 'placeholder' => 'Service Type'])}}
                              </div>
                              <div class="form-group">
                                  {{Form::label('service_price', 'Service Price')}}
                                  {{Form::text('service_price', $s->service_price, ['class' => 'form-control', 'placeholder' => 'Service Price'])}}
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              {{Form::hidden('_method', 'PUT')}}
                              {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                              {!! Form::close() !!}
                          </div>
                      </div>
                  </div>
              </div>
        </table>
        <!--Table-->
      </div>
</div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Service</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            {!! Form::open(['action'=> 'ServicesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                            <div class="form-group">
                                {{Form::label('service_name', 'Service Name')}}
                                {{Form::text('service_name', '', ['class' => 'form-control', 'placeholder' => 'Service Name'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('service_description', 'Service Description')}}
                                {{Form::text('service_description', '', ['class' => 'form-control', 'placeholder' => 'Service Description'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('service_type', 'Service Type')}}
                                {{Form::text('service_type', '', ['class' => 'form-control', 'placeholder' => 'Service Type'])}}
                            </div>
                            <div class="form-group">
                                {{Form::label('service_price', 'Service Price')}}
                                {{Form::text('service_price', '', ['class' => 'form-control', 'placeholder' => 'Service Price'])}}
                            </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection
