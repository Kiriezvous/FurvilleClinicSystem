@extends('layouts.master')

@section('content')
<div class="card-header">
    {{-- Header --}}
    <h1>Categories</h1>
</div>
    <div class="table-responsive">
        <!--Table-->
        <table class="table">
          <!--Table head-->
          <thead>
            <tr>
              <th>#</th>
              <th class="th-lg">Category Type</th>
              <th class="th-lg">Description</th>
              <th class="th-lg">Actions</th>
            </tr>
          </thead>
          <!--Table head-->
          @if(count($posts)> 0)
          @foreach($posts as $category)
          <!--Table body-->
          <tbody>
            <tr>
              <th scope="row">{{$category->id}}</th>
              <td>{{$category->category_type}}</td>
              <td>{{$category->description}}</td>
              <td><a href="/categories/{{$category->id}}/edit" class="btn btn-info">Edit</a></td>
              <td>
                {!!Form::open(['action' => ['CategoriesController@destroy', $category->id], 'method' => 'POST'])!!}

                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'] )}}

                {!!Form::close()!!}
            </td>
            </tr>
          </tbody>
          <!--Table body-->
          @endforeach

        @else
        <p>No category found</p>
        @endif
        </table>
        <!--Table-->
      </div>

      <div data-toggle="modal" data-target="#exampleModal">
        <a href="/categories/create" class="btn btn-success">Add Category</a>
      </div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
    Add Category
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h1>Add Category</h1>
                {!! Form::open(['action'=> 'CategoriesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {{Form::label('category_type', 'Category Type')}}
                    {{Form::text('category_type', ' ', ['class' => 'form-control', 'placeholder' => 'Category Type'])}}
                </div>
                <div class="form-group">
                    {{Form::label('description', 'Description')}}
                    {{Form::text('description', ' ', ['class' => 'form-control', 'placeholder' => 'Description'])}}
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection
