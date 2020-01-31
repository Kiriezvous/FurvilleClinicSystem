@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Animal Categories</h1>
</div>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th class="th-lg">Animal Type</th>
              <th class="th-lg">Description</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($posts)> 0)
          @foreach($posts as $animaltype)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$animaltype->id}}</th>
              <td><img width="100%" src="/storage/assets/image/animaltypes/{{$item->image}}"></td>
              <td>{{$animaltype->animal_type}}</td>
              <td>{{$animaltype->description}}</td>
              <td><a href="/animaltypes/{{$animaltype->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['AnimalTypesController@destroy', $animaltype->id], 'method' => 'POST'])!!}
        
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
        
                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No animal type found</p>
        @endif
        </table>
        <!--Table-->
      </div>

      <div>
        <a href="/animaltypes/create" class="btn btn-success">Add Animal Type</a>
      </div>
</div>

@endsection