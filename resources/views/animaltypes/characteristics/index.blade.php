@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Characteristics</h1>
</div>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th class="th-lg">Characteristics</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($posts)> 0)
          @foreach($posts as $type)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$type->id}}</th>
              <td>{{$type->characteristic}}</td>
              <td><a href="/characteristics/{{$type->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['BreedCharacteristicsController@destroy', $type->id], 'method' => 'POST'])!!}
        
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}
        
                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No characteristics found</p>
        @endif
        </table>
        <!--Table-->
      </div>

      <div>
        <a href="/characteristics/create" class="btn btn-success">Add Characteristics</a>
      </div>
</div>

@endsection