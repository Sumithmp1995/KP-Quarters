@extends('layouts.unitHead-dashboard')
@section('content')
 

<h2> Complete Your Profile </h2>
<a class="nav-link " href="{{ route('unitHead-add_unitHead')}}">
    <i class="bi bi-sticky"></i>
<<<<<<< HEAD
    <span>Add UnitHead profile</span>      
=======
    <span>Add Unit Head Profile</span>      
>>>>>>> 1542ceb9a615602f7a05fa383f254d20214222b4
  </a>

  <a class="nav-link " href="{{ route('unitHead-addRi')}}">
    <i class="bi bi-pen"></i>
    <span> Add RI Profile</span>
  </a>

  @endsection