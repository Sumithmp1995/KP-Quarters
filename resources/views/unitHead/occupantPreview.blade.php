@extends('layouts.unitHead-dashboard')
@section('content')
    <h3 class="  text-center pb-md-0 mb-md-5"> ALLOTMENT PREVIEW </h3>

    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-9 ml-auto">
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICANT NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $occupant->applicant_name }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <label for="inputname">APPLICATION NUMBER</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" id="inputname" name="applicant_Name"
                            value="{{ $occupant->application_no }}" readonly>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputpen" name="pen_No"
                                value="{{ $occupant->pen }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputrank" name="rank"
                                value="{{ $occupant->rank }}  &nbsp {{ $occupant->gl_no }} " readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PRESENT OFFICE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputoffice"
                                value="{{ $occupant->present_unit }}" name="present_Office" readonly>
                        </div>
                    </div>
                </div>


                <div class="col-md-3 text-center" style="width: 190px;">
                    <div class="row p-1 text-center" style="height: 190px;">
                        <img src="{{ asset('storage/' . $occupant->photo) }}" class="img-thumbnail rounded"
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
                        value="{{ $occupant->pay }} &nbsp {{ $occupant->scale_of_pay }} " readonly>
                </div>
            </div>


            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF BIRTH</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputdob" value="{{ $occupant->date_of_birth }}"
                        name="date_Of_Birth" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF JOINING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputdoj" value="{{ $occupant->date_of_joining }}"
                        name="date_Of_Birth" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">DATE OF SUPERANNUATION</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputsa"
                        value="{{ $occupant->date_of_superannuation }}" name="date_Of_Superannuation" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">PERMANENT ADDRESS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="textarea" class="form-control" id="inputHousename" value="{{ $occupant->house_name }}"
                        name="house_Name">
                    <input type="text" class="form-control" id="inputStreat_name" name="streat_Name"
                        value={{ $occupant->street_name }}>
                    <input type="text" class="form-control" id="inputPostOffice"
                        value="{{ $occupant->post_office }}" name="post_Office">
                    <input type="text" class="form-control" id="inputPin" value="{{ $occupant->pin_code }}"
                        name="pin_Code">
                    <input type="text" class="form-control" id="inputCity" value="{{ $occupant->village }}"
                        name="village">
                    <input type="text" class="form-control" id="inputCity" value="{{ $occupant->taluk }}"
                        name="taluk">
                    <input type="text" class="form-control" id="inputZip" value="{{ $occupant->district }}"
                        name="district">
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">MARITAL STATUS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice" value="{{ $occupant->marital_status }}"
                        name="present_Office" readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">NOT BEING OCCUPANT TO ANY QUARTERS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $occupant->partner_employee ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                        MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $occupant->radius_five_miles ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $occupant->quarters_no }}"
                        readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NAME</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $occupant->quarters_name }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> MOBILE NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $occupant->present_unit }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $occupant->marriage_certificate) }}"
                        class="btn btn-block  "><u>Marriage
                            Certificate</u></a>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $occupant->working_status_doc) ?? abort(404) }}"
                        class="btn btn-block border "><u>Supporting Documents</u></a>
                </div>
            </div>
        </div>

        </div>
    </form>





    <form class=" bg-white border " action="{{ route('unitHead.allotment_complete') }}" method="POST"
        enctype="multipart/form-data">
        @csrf

        <div class="row mt-3 border p-3" id="allot">
            <label class="font-weight-bold"> UPLOAD PROCEEDINGS</label>
            <div class="form-group col-md-6 mt-3">
                <input type="file" class="form-control" id="proceedings_doc" name="proceedings_doc">
                @error('proceedings_doc')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <label class="text-success">Upload Proceedings in in pdf format</label>


            <div class="form-group col-md-6 mt-3">
                <label for="proceedings_no">PROCEEDINGS NUMBER</label>
                <input type="text" class="form-control" id="proceedings_no" placeholder="proceedings_no"
                    name="proceedings_no" value="">
                @error('proceedings_no')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <input type="hidden" class="form-control" id="inputCity"  name="user_id"
            value="{{ $occupant->user_id }}">

            <input type="hidden" class="form-control" id="typeOfApplicant"  name="typeOfApplicant"
            value="{{ $occupant->typeOfApplicant }}">
            <input type="hidden" class="form-control" id="typeOfQuarters"  name="typeOfQuarters"
            value="{{ $occupant->typeOfQuarters }}">

        <input type="hidden" class="form-control" id="applicant_id"  name="applicant_id"
            value="{{ $occupant->applicant_id }}">

        <div class="form-group mt-3 mb-3">
            <div onclick="window.print()" type="button" class="btn btn-success mx-auto " title="">
                PRINT </div>
        </div>

        <div class="form-group mb-3">
            <button type="submit" class="btn btn-success mx-auto " title="">
                ALLOT </button>
        </div>


    </form>
@endsection
