@extends('layouts.unitHead-dashboard')
@section('content')
 

<h2> Complete Your Profile </h2>
<a class="nav-link " href="{{ route('unitHead-add_unitHead')}}">
    <i class="bi bi-sticky"></i>
    <span>Add Unit Head Profile</span>      
  </a>

  <a class="nav-link " href="{{ route('unitHead-addRi')}}">
    <i class="bi bi-pen"></i>
    <span> Add RI Profile</span>
  </a>

  @endsection