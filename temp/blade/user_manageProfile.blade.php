@extends('layouts.user-dashboard')
@section('content')

<div class="pagetitle">
    <h1>Profile</h1>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="{{ asset('/images/no-image.png')}}" alt="Profile" class="rounded-circle">
            <h2>{{$applicant->applicant_name}}</h2>
          </div>
        </div>

        

      </div>







      

      <div class="col-xl-8">
        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">

              <li class="nav-item">
                <button class=" btn btn-success" data-bs-toggle="tab" data-bs-target="#profile-overview">OVERVIEW</button>
              </li>
              <li class='mx-3'>
                <a href="{{ route('user.edit_application')}}/{{$applicant->id }}"  type="submit" class="btn btn-success"> EDIT PROFILE </a>
            </li>

            </ul>
            <div class="tab-content pt-1">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">APPLICANT NAME</div>
                  <div class="col-lg-9 col-md-8">{{$applicant->applicant_name}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">RANK </div>
                  <div class="col-lg-9 col-md-8">{{$applicant->rank}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PEN</div>
                  <div class="col-lg-9 col-md-8">{{$applicant->pen}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PRESENT OFFICE</div>
                  <div class="col-lg-9 col-md-8">{{$applicant->present_unit}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">PERMENANT ADDRESS</div>
                  <div class="col-lg-9 col-md-8"> {{$applicant->house_name}}, {{$applicant->street_name}}, 
                                               {{$applicant->post_office}} {{$applicant->pin_code}}</div>
                </div>

                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"> {{$applicant->mob}} </div>
                </div>
              </div>

            </div><!-- End Bordered Tabs -->

          </div>
        </div>

      </div>
    </div>
  </section>
@endsection