@extends("layouts.user-dashboard")
@section("content")


<!-- card style ........................................ -->

<div class="row">
  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Live updates</span>
      <p>Click here to go .</p>
      <div class="go-corner">
      </div>
    </a>
  </div>
  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Quarters status</span>
      <p>View and download reports.</p>
      <div class="go-corner">
      </div>
    </a>
  </div>
  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Rules and regulations</span>
      <p>Rules.</p>
      <div class="go-corner">
      </div>
    </a>
  </div>
</div>

<!-- card style ends  ........................................ -->



<link href="assets/css/usercard.css" rel="stylesheet">

@endsection