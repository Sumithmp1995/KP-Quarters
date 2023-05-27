@extends('layouts.user-dashboard')
@section('content')
    @if (auth()->user()->remember_token == 3)
        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#editApplication">
            Re-Submit Application </button>
        <div class="modal-body border mt-3 text-bg-danger">
            {{ $applicant->remark }}
        </div>
    @endif

    <!-- Modal -->
    <div class="modal fade" id="editApplication" tabindex="-1" role="dialog" aria-labelledby="editApplicationTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title " id="editApplicationTitle">Read carefully before Edit your Application </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    1. All fields are mandatory <br>
                    2. Verify all fields are filled <br>
                    2. Upload Your Document in Readable Quality
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ route('user-editApplication', [$applicant->id]) }}"> <button type="button"
                            class="btn btn-success">Edit Application</button> </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal ends -->


    <h4 class="  text-center pb-md-0 mt-3 mb-md-5"> APPLICATION PREVIEW </h4>
    <form class=" bg-white border border-info mb-3" action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid ">
            <div class="row p-2">
                <div class="col-md-3 text-center " style="width: 160px;">
                    <div class="row p-1 text-center">
                        <img src="{{ asset('storage/' . $applicant->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>
                    </div>
                </div>
                <div class="col-md-10 border">
                    <div class="row ">
                        <div class="col-md-6 ">
                            <label class="mt-2" for="inputname">APPLICANT NAME  </label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2"> {{ $applicant->applicant_name }}</label>
                        </div>
                    </div>
                    <div class="row p-1 ">
                        <div class="col-md-6 ">
                            <label for="inputname">APPLICATION NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            :<label class="m-2">{{ $applicant->application_no }} </label>
                        </div>
                    </div>

                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            :<label class="m-2">{{ $applicant->pen }} </label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2">{{ $applicant->rank }} &nbsp {{ $applicant->gl_no }} </label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PRESENT OFFICE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2"> {{ $applicant->present_unit }} </label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                           <label for="inputname">PAY & SCALE OF PAY</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2">{{ $applicant->pay }} &nbsp [ {{ $applicant->scale_of_pay }} ]</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">MARITAL STATUS</label>
                </div>
                <div class="col-md-6 ml-auto">
                        : <label class="m-2">{{ $applicant->marital_status }} </label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF BIRTH</label>
                </div>
                <div class="col-md-6 ml-auto">
                    :<label class="m-2">{{ $applicant->date_of_birth }} </label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF JOINING</label>
                </div>
                <div class="col-md-6 ml-auto">
                  :  <label class="m-2">{{ $applicant->date_of_joining }}</label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF SUPERANNUATION</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2">{{ $applicant->date_of_superannuation }} </label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">PERMANENT ADDRESS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input name="first_name"
                        value="{{ $applicant->house_name }},  {{ $applicant->street_name }},  {{ $applicant->post_office }} PO,  {{ $applicant->pin_code }}"
                        class="form-control" type="text">
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1"> COMMUNICATION ADDRESS </label>
                </div>
                <div class="col-md-6 ml-auto">
                    @if ($applicant['differentAddress'] == 0)
                        <input name="first_name"
                            value="{{ $applicant['house_name'] }} {{ $applicant['street_name'] }}  {{ $applicant['post_office'] }} PO,  {{ $applicant->pin_code }}"
                            class="form-control" type="text">
                    @else
                        <input name="first_name" value="{{ $applicant['tempAddress'] }}" class="form-control"
                            type="text">
                    @endif
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">VILLAGE </label>
                </div>
                <div class="col-md-6 ml-auto">
                        : <label class="m-2">{{ $applicant->village }} </label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">TALUK </label>
                </div>
                <div class="col-md-6 ml-auto">
                        : <label class="m-2">{{ $applicant->taluk }} </label>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">DISTRICT </label>
                </div>
                <div class="col-md-6 ml-auto">
                        : <label class="m-2"> {{ $applicant->district }} </label>
                </div>
            </div>
          

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">NOT BEING OCCUPANT TO ANY QUARTERS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $applicant->partner_employee ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                        MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $applicant->radius_five_miles ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> MOBILE NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $applicant->mob }}" readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> MARRIAGE CERTIFICATE </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $applicant->marriage_certificate) }}" class="btn btn-block"
                        target="blank"> <u>Marriage
                            Certificate</u></a>
                </div>
            </div>

            @if ($applicant->working_status_doc != 'not applicable')
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> WORKING ARRANGEMENT PROCEEDINGS </label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <a href="{{ asset('storage/' . $applicant->working_status_doc) ?? abort(404) }}"
                            class="btn btn-block border "><u>Supporting Documents</u></a>
                    </div>
                </div>
            @endif
 <div class="row p-1 ">
                <div class="col-md-12 p-2 d-flex justify-content-center border p-2">
                    <label for="inputname">QUARTERS PRIORITY</label>
                </div>
                <div class="p-2">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname" class="m-2"> PRIORITY - I</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        : <label for="inputname" class="m-2">{{ $applicant->p1 }}</label>
                    </div>
                    @if ($applicant->p2)
                        <div class="col-md-6 ml-auto">
                            <label for="inputname" class="m-2"> PRIORITY - II</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                          :  <label for="inputname" class="m-2">{{ $applicant->p2 }}</label>
                        </div>
                    @endif
                    @if ($applicant->p3)
                        <div class="col-md-6 ml-auto">
                            <label for="inputname" class="m-2"> PRIORITY - III</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                           : <label for="inputname" class="m-2">{{ $applicant->p3 }}</label>
                        </div>
                    @endif
                </div>
            </div>
            <div class="row p-1 border mb-5">
                <div class="col-md-12 ml-auto">
                    <label for="inputname">DECLARATION</label>
                    <br>
                    <input type="checkbox" checked class="pb-3">I have read and understood the rules for the allotment
                    and
                    occupation of quarters for police
                    personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
                    Government pay,from time to time ,make in this regard . The information furnished by me above
                    is correct and true to the best of my knowledge and belief
                </div>
            </div>
        </div>
    </form>
    <div class="d-flex justify-content-center mb-3">
        <a href="{{ route('user-home') }}" class="btn btn-primary"> Home</a>
    </div>
@endsection
