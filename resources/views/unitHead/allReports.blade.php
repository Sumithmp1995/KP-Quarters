@extends('layouts.unitHead-dashboard')
@section('content')
<link href="assets/css/usercard.css" rel="stylesheet"> <!-- Dashboard cards   -->
<!-- card style ........................................ -->
<div class="row">
    <div class="col-md-3">
        <a class="datcard my-3" href="#">
            <span style="color:white;" class="h4">APPLICATIONS</span>
            <p>REGISTER.</p>
            <div class="go-corner">
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a class="datcard my-3" href="  {{ route('user-selectSeniorityListType') }} ">
            <span style="color:white;" class="h4">OCCUPANTS </span>
            <p>REGISTER</p>
            <div class="go-corner">
            </div>
        </a>
    </div>
    <div class="col-md-3">
        <a class="datcard my-3" href="#">
            <span style="color:white;" class="h4">VACATEES</span>
            <p>REGISTER.</p>
            <div class="go-corner">
            </div>
        </a>
    </div>

    <div class="col-md-3">
        <a class="datcard my-3" href="#">
            <span style="color:white;" class="h4">QUARTERS</span>
            <p>REGISTER.</p>
            <div class="go-corner">
            </div>
        </a>
    </div>
</div>
<script src="assets/js/main.js"></script>
@endsection