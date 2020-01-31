@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Dogs</h1>
</div>
<br>
<div>
    <a href="/dogs/create" class="btn btn-success">Add Breed</a>
  </div>
  <br>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th>Image</th>
              <th>Breed</th>
              <th class="th-lg">Description</th>
              <th class="th-lg">Type</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($Dogs)> 0)
          @foreach($Dogs as $item)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td><img width="100px" height="100px" src="/storage/assets/image/dogbreeds/{{$item->image}}"></td>
              <td>{{$item->breed_name}}</td>
              <td>{{$item->breed_description}}</td>
              {{-- Need to change category_id (id) to (category_type) using Model --}}
              <td>{{$item->animaltypes->animal_type}}</td>
              <td><a href="/dogs/{{$item->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['DogsController@destroy', $item->id], 'method' => 'POST'])!!}
        
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
        
                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No breed found</p>
        @endif
        </table>
        <!--Table-->
        {{-- {!! $users->render() !!} --}}
      </div>

@endsection