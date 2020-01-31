@extends('layouts.website')

@section('content')

<!-- style="border-radius: 50%; width: 250px; height: 250px;" -->
<div class="card card-success">
    <div class="card-header">
        <h5 class="m-0">Profile</h5>
    </div>
    <div class="card-body">
    <div class="row no-gutters position-relative">
  <div class="col-md-4 mb-md-0 p-md-4">
  <img src="../assets/image/website/about.png" class="d-block" style="border-radius: 50%; width: 250px; height: 250px;" alt="...">
  
  </div>  
  <div class="col-md-6 position-static p-4 pl-md-0">
  <h5 class="mt-0"><b>Name:</b> {{ Auth::user()->name }}</h5>
  <h5 class="mt-0"><b>Email:</b> {{ Auth::user()->email }}</h5>
  <h5 class="mt-0"><b>Pet(s):</b> </h5>
  </div>

</div>
    </div>
</div>

<div class="card card-warning card-outline">
    <div class="card-header">
        <h5 class="m-0">Purchase History</h5>
    </div>
    <div class="card-body">
    <div class="callout callout-danger">
                  <h5>I am a danger callout!</h5>

                  <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                    soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.</p>
                </div>
    </div>
</div>

<div class="card card-danger card-outline">
    <div class="card-header">
        <h5 class="m-0">Medical History</h5>
    </div>
    <div class="card-body">
    <div class="callout callout-danger">
                  <h5>I am a danger callout!</h5>

                  <p>There is a problem that we need to fix. A wonderful serenity has taken possession of my entire
                    soul,
                    like these sweet mornings of spring which I enjoy with my whole heart.</p>
                </div>
    </div>
    </div>
</div>

@endsection