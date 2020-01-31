@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Services</h1>
</div>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th class="th-lg">Service Name</th>
              <th class="th-lg">Description</th>
              <th class="th-lg">Price</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($posts)> 0)
          @foreach($posts as $service)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$service->id}}</th>
              <td>{{$service->service_name}}</td>
              <td>{{$service->service_description}}</td>
              <td>{{$service->service_price}}</td>
              <td><a href="/services/{{$service->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['ServicesController@destroy', $service->id], 'method' => 'POST'])!!}
        
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
        
                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No service found</p>
        @endif
        </table>
        <!--Table-->
      </div>

      <div>
        <a href="/services/create" class="btn btn-success">Add Service</a>
      </div>
</div>

@endsection