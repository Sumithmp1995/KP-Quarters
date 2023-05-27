@extends('layouts.ri-dashboard')
@section('content')
    <h5 class="  text-center pb-md-0 mb-md-4"> APPLICATION PREVIEW </h5>
    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid ">
            <div class="row p-2">
                <div class="col-md-3 text-center  m-2 " style="width: 160px; height:220px">
                    <div class="row p-1 text-center">
                        <img src="{{ asset('storage/' . $applicant->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>
                    </div>
                </div>
                <div class="col-md-10 border  m-2">
                    <div class="row ">
                        <div class="col-md-6">
                            <label class="m-2" for="inputname">APPLICANT NAME </label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2"> {{ $applicant->applicant_name }}</label>
                        </div>
                    </div>
                    <div class="row p-1 ">
                        <div class="col-md-6 ">
                            <label for="inputname" class="m-2">APPLICATION NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            :<label class="m-2">{{ $applicant->application_no }} </label>
                        </div>
                    </div>

                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname" class="m-2">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            :<label class="m-2">{{ $applicant->pen }} </label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname" class="m-2">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2">{{ $applicant->rank }} &nbsp {{ $applicant->gl_no }} </label>
                        </div>
                    </div>
                    <div class="row p-1">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname" class="m-2">PRESENT OFFICE</label>
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
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">MARITAL STATUS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->marital_status }} </label>
                </div>
            </div>
            <div class="row p-2 border ">
                <div class="col-md-6 ml-auto ">
                    <label for="inputname" class="m-2">DATE OF BIRTH</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->date_of_birth }} </label>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">DATE OF JOINING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->date_of_joining }} </label>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">DATE OF SUPERANNUATION</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->date_of_superannuation }} </label>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">PERMANENT ADDRESS</label>
                </div>
                <div class="col-md-6 ml-auto  pl-5">
                    : <label class="m-2"> {{ $applicant->house_name }} </label> <br>
                    &nbsp <label class="m-2"> {{ $applicant->street_name }} </label> <br>
                    &nbsp<label class="m-2"> {{ $applicant->post_office }} PO </label> <br>
                    &nbsp <label class="m-2"> {{ $applicant->pin_code }} </label>
                </div>
            </div>

            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">COMMUNICATION ADDRESS </label>
                </div>
                <div class="col-md-6 ml-auto">
                    @if ($applicant['differentAddress'] == 0)
                        : <label class="m-2"> {{ $applicant['house_name'] }} , {{ $applicant['street_name'] }} ,
                            {{ $applicant['post_office'] }} PO, {{ $applicant->pin_code }} </label>
                    @else
                        : <label class="m-2"> {{ $applicant['tempAddress'] }} </label>
                    @endif
                </div>
            </div>

            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">VILLAGE </label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->village }} </label>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">TALUK </label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->taluk }} </label>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">DISTRICT </label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->district }} </label>
                </div>
            </div>

            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2">NOT BEING OCCUPANT TO ANY QUARTERS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $applicant->partner_employee ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-2 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2"> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                        MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $applicant->radius_five_miles ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2"> MOBILE NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    : <label class="m-2"> {{ $applicant->mob }} </label>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="m-2"> MARRIAGE CERTIFICATE </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $applicant->marriage_certificate) }}" class="btn btn-block"
                        target="_blank">
                        <u> Click to download</u></a>
                </div>
            </div>
            @if ($applicant->working_status_doc != 'not applicable')
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> WORKING ARRANGEMENT PROCEEDINGS </label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <a href="{{ asset('storage/' . $applicant->working_status_doc) }}" class="btn btn-block border"
                            target="_blank"><u> Click to download </u></a>
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
                            : <label for="inputname" class="m-2">{{ $applicant->p2 }}</label>
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
            <div class="row p-1 border">
                <div class="col-md-12 ml-auto">
                    <label for="inputname">DECLARATION</label>
                </div>
            </div>
            <input type="checkbox" checked readonly class="m-4 pb-3">I have read and understood the rules for the
            allotment and
            occupation of quarters for police
            personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
            Government pay,from time to time ,make in this regard . The information furnished by me above
            is correct and true to the best of my knowledge and belief
        </div>
        <div class="modal-footer d-flex justify-content-center">
            <a class="btn btn-secondary d-flex justify-content-left" href=" {{ route('ri-application_requests') }}"> Back
            </a>
        </div>
    </form>
@endsection
