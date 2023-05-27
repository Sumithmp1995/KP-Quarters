@extends('layouts.unitHead-dashboard')
@section('content')
    <h3 class="  text-center pb-md-0 mb-md-5"> APPLICATION PREVIEW </h3>

    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 ml-auto">
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto ">
                            <label class="mt-2" for="inputname">APPLICANT NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            : <label class="m-2"> {{ $applicant->applicant_name }}</label>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICATION NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $applicant->application_no }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputpen" name="pen_No"
                                value="{{ $applicant->pen }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputrank" name="rank"
                                value="{{ $applicant->rank }}  &nbsp {{ $applicant->gl_no }} " readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PRESENT OFFICE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputoffice"
                                value="{{ $applicant->present_unit }}" name="present_Office" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center" style="width: 190px;">
                    <div class="row p-1 text-center" style="height: 190px;">
                        <img src="{{ asset('storage/' . $applicant->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>

                    </div>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">PAY & SCALE OF PAY</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="label" class="form-control" id="inputpay" name="pay"
                        value="{{ $applicant->pay }} &nbsp {{ $applicant->scale_of_pay }} " readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF BIRTH</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputdob" value="{{ $applicant->date_of_birth }}"
                        name="date_Of_Birth" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF JOINING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputdoj" value="{{ $applicant->date_of_joining }}"
                        name="date_Of_Birth" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF SUPERANNUATION</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputsa"
                        value="{{ $applicant->date_of_superannuation }}" name="date_Of_Superannuation" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">PERMANENT ADDRESS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="textarea" class="form-control" id="inputHousename" value="{{ $applicant->house_name }}"
                        name="house_Name">
                    <input type="text" class="form-control" id="inputStreat_name" name="streat_Name"
                        value={{ $applicant->street_name }}>
                    <input type="text" class="form-control" id="inputPostOffice"
                        value="{{ $applicant->post_office }}" name="post_Office">
                    <input type="text" class="form-control" id="inputPin" value="{{ $applicant->pin_code }}"
                        name="pin_Code">
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">VILLAGE </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputCity" value="{{ $applicant->village }}"
                        name="village">
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">TALUK </label>
                </div>
                <div class="col-md-6 ml-auto">
                <input type="text" class="form-control" id="inputCity" value="{{ $applicant->taluk }}"
                    name="taluk">
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname" class="mt-1">DISTRICT </label>
                </div>
                <div class="col-md-6 ml-auto">
                <input type="text" class="form-control" id="inputZip" value="{{ $applicant->district }}"
                    name="district">
            </div>
        </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">MARITAL STATUS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $applicant->marital_status }}" name="present_Office" readonly>
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
                    <input type="text" class="form-control" name="mobile" value="{{ $applicant->mob }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $applicant->marriage_certificate) }}"
                        class="btn btn-block" target="_blank"><u>Marriage
                            Certificate</u></a>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $applicant->working_status_doc) ?? abort(404) }}"
                        class="btn btn-block border" target="_blank"><u>Supporting Documents</u></a>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-12 ml-auto">
                    <label for="inputname">DECLARATION</label>
                </div>
            </div>
            <input type="checkbox" checked class="m-4 pb-3">I have read and understood the rules for the allotment and occupation of quarters for police
                personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
                Government pay,from time to time ,make in this regard . The information furnished by me above
                is correct and true to the best of my knowledge and belief
        </div>
        </div>
    </form>
@endsection

