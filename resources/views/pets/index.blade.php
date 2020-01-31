@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Pets</h1>
</div>
<br>
<div>
    <a href="/pets/create" class="btn btn-success">Add Pet</a>
  </div>
  <br>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th class="th-lg">Type</th>
              <th>Image</th>
              <th class="th-lg">Name</th>
              <th class="th-lg">Gender</th>
              <th class="th-lg">Blood Type</th>
              <th class="th-lg">Weight</th>
              <th class="th-lg">Height</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($Pets)> 0)
          @foreach($Pets as $item)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$item->id}}</th>
              <th scope="row">{{$item->animaltypes->animal_type}}</th>
              <td><img width="100%" src="/storage/assets/image/products/{{$item->image}}"></td>
              <td>{{$item->name}}</td>
              <td>{{$item->genders->gender}}</td> 
              <td>{{$item->blood_types->blood_type}}</td>
              <td>{{$item->measurements->weight}}</td>
              <td>{{$item->measurements->height}}</td>
              <td><a href="/products/{{$item->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['PetsController@destroy', $item->id], 'method' => 'POST'])!!}
        
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
        
                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No item found</p>
        @endif
        </table>
        <!--Table-->
        {{-- {!! $users->render() !!} --}}
      </div>

@endsection