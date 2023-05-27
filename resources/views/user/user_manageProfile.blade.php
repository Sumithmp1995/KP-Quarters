
                    @extends('layouts.user-dashboard')
                    @section('content')
                    
                        <!------ Include the above in your HEAD tag ---------->
                        <div class="container m-3">
                             <div class="main-body border"> 
                                <div class="row  m-5">
                                    <div class="col-lg-4">
                                        <div class="card1">
                                            <div class="card-body">
                                                <div class="d-flex flex-column align-items-center text-center">
                                                    <img src="{{ asset('storage/' . auth()->user()->photo ) }}"  
                                                     class="rounded-circle" onerror= "this.onerror = null; this.src='{{ URL::to('/') }}/assets/img/profile-img.png' "
                                                     height="120px" />
                 
                                                    <div class="mt-3">
                                                        <h4> {{ auth()->user()->name   }} </h4>
                                                        <p class="text-secondary mb-1"> PEN:  {{ auth()->user()->pen   }} </p>
                                                        @if($applicant)
                                                        <p class="text-muted font-size-sm"> {{ $applicant->rank }} </p>
                                                        <p class="text-muted font-size-sm">{{ $applicant->gl_no }} </p>
                                                        @endif
                                                        <p class="text-muted font-size-sm">{{ auth()->user()->present_unit }} </p>
                                                         <a class="btn btn-primary mt-5" href=" {{ route('user-home')}}"> Home</a> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card1">
                                            <div class="card-body">
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h5 class="mb-4">Full Name</h5>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h5 for=" "> {{ auth()->user()->name   }} </h5>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h5 class="mb-4"> Pen</h5>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h5 for=" "> {{ auth()->user()->pen   }} </h5>
                                                    </div>
                                                </div>
                                                @if($applicant)
                                                <div class="row mb-4">
                                                    <div class="col-sm-3">
                                                        <h5 class="mb-0">Mobile</h5>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        <h5 for=" "> {{ $applicant->mob   }} </h5>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h5 class="mb-4">Permanent Address</h5>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                          <h5 for=" "> {{ $applicant->house_name }},  {{ $applicant->street_name }},  {{ $applicant->post_office }} PO,  {{ $applicant->pin_code }}</h5>
                                                    </div>
                                                </div>
                                                <div class="row mb-3">
                                                    <div class="col-sm-3">
                                                        <h5 class="mb-4">Present Address</h5>
                                                    </div>
                                                    <div class="col-sm-9 text-secondary">
                                                        @if(!$applicant->tempAddress)
                                                         <h5 for="">   {{ $applicant->house_name }},  {{ $applicant->street_name }},  {{ $applicant->post_office }} PO,  {{ $applicant->pin_code }} </h5>
                                                         @else
                                                         {{ $applicant->tempAddress }}
                                                         @endif
                                                    </div>
                                                </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="d-flex align-items-center mb-3">Profile Status</h5>
                                                        <p>Basic data</p>
                                                        <div class="progress mb-3" style="height: 5px">
                                                            @if($applicant)
                                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                             @else
                                                             <div class="progress-bar bg-danger" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                                           @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endsection