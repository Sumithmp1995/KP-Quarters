@extends('layouts.user-dashboard')
@section('content')
    <h6 class="text-center w-100"> APPENDIX-1 [Vide rule 10(a)]</h6>
    <h3 class=" pb-2 text-center pb-md-0 mb-md-5">Application for allotment of family quarters</h3>

    <form class=" bg-white border p-4" action="{{ route('user-updateApplication', $applicant->id) }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row pb-3">
            <div class="form-group col-xl-4 mt-3">
                <label for="inputname">APPLICANT NAME</label>
                <input type="text" class="form-control" id="inputname" name="applicant_name" placeholder="APPLICANT NAME"
                    value="{{ auth()->user()->name }}" readonly>
                @error('applicant_name')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-xl-4 mt-3">
                <label for="inputpen">PEN</label>
                <input readonly type="text" class="form-control" id="inputpen" name="pen" placeholder="PEN No"
                    value="{{ auth()->user()->pen }}" readonly>
                @error('pen')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-xl-4 mt-3">
                <label for="type">APPLICANT CATEGORY </label>
                <select class="form-control form-control-lg" name="applicant_type" id="type" required
                    placeholder="CHOOSE APPLICANT CATEGORY">
                    <option value=""> CHOOSE APPLICANT CATEGORY </option>
                </select>
                @error('type')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-xl-4 mt-3">
                <label for="inputrank"> DESIGNATION / RANK </label>
                <select class="form-control form-control-lg" name="rank" id="rank" required>
                    <option value=""> CHOOSE YOUR DESIGNATION </option>
                </select>
                @error('rank')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-xl-4 mt-3" style="display: none;" id="glNo">
                <label for="gl_no">GL.No</label>
                <input type="text" class="form-control" id="gl_no" name="gl_no" placeholder="GL.No"
                    value="{{ $applicant->gl_no }}">
            </div>
        </div>
        <div class='row border'>
            <div class="form-group col-md-6 mt-4">
                <label class="font-weight-bold m-2"> UPLOAD PASSPORT SIZE PHOTO</label>
                <input type="file" class="form-control" id="photo" name="photo" required>
                @error('photo')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
                <label class="text-success"> Image should be .jpg format</label>
            </div>

            <div class="col-md-6 mt-4 ">
                <label class="font-weight-bold m-2" for="input_mother_unit"> MOTHER UNIT </label>
                <input type="text" class="form-control form-control-lg" onkeyup="this.setAttribute('value', this.value);"
                    name="mother_unit" value="{{ auth()->user()->mother_unit }}" id="mother_unit">
                @error('mother_unit')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="row ">
            <div class="form-group col-md-4 mt-3">
                <label for="inputpay">BASIC PAY</label>
                <input type="text" class="form-control" id="pay" name="pay" placeholder="Pay" required
                    value="{{ $applicant->pay }}" onchange="checkPay()">
                    <p id="payError" class="text-danger"></p>
                @error('pay')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <label for="validationCustom04">SCALE OF PAY</label>
                <select class="form-control form-control-lg" id="scale_of_pay" placeholder="Scale of pay"
                    name="scale_of_pay" required readonly>
                </select>
                @error('scale_of_pay')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="col-md-4 mt-3 mb-2 dropdown">
                <label for="inputoffice"> QUARTERS APPROVING AUTHORITY </label>
                <select class="form-control form-control-lg" required name="present_unit" id="present_unit"
                    onchange="showFileUpload('working_status'); ">
                    <option selected> CHOOSE YOUR OFFICE OF APPROVING AUTHORITY </option>
                    @foreach ($presentUnits as $presentUnit)
                        <option value="{{ $presentUnit->present_unit }}"> {{ $presentUnit->present_unit }}</option>
                    @endforeach
                </select>
                @error('present_unit')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>


        <div id='working_status' style="display: none;">
            <div class="form-group mt-5  p-2">
                <label class="fw-bold "> CURRENT WORKING STATUS </label>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="working_status_file" id="wsRadio"
                        value='WORKING ARRANGEMENT'>
                    <label class="form-check-label" for="flexRadioDefault1">
                        WORKING ARRANGEMENT
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="working_status_file" id="wsRadio"
                        value='DEPUTATION'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        TRANSFER AND POSTING
                    </label>
                </div>

                <span class="row mt-3  p-3" id="workingStatus">
                    <label class="font-weight-bold text-bg-danger"> UPLOAD SUPPORTING DOCUMENTS</label>
                    <input type="file" class="form-control" name="working_status_doc" id="workingStatusDoc">
                    <label class="text-success">Upload Proceedings in pdf format</label>
                    @error('working_status_doc')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </span>
            </div>
        </div>
        <div class="row ">
            <div class="form-group col-md-4 mt-2">
                <label for="inputdob">DATE OF BIRTH</label>
                <input type="date" class="form-control" id="inputdob" placeholder="DATE OF BIRTH"
                    name="date_of_birth" value="{{ $applicant->date_of_birth }}">
                @error('date_of_birth')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-2">
                <label for="date_of_joining">DATE OF JOINING</label>
                <input type="date" class="form-control" id="inputdoJ" placeholder="DATE OF JOINING"
                    name="date_of_joining" value="{{ $applicant->date_of_joining }}" onChange="doSomething()">
                @error('date_of_joining')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-2">
                <label for="inputsa">DATE OF SUPERANNUATION</label>
                <input type="date" class="form-control" id="inputsa" placeholder="superannuation"
                    name="date_of_superannuation" value="{{ $applicant->date_of_superannuation }}">
                @error('date_of_superannuation')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>
        <!-- Address -->
        <div class="row  mt-3 border p-3">
            <label for="inputCity">Permenant Address </label>
            <div class="row ">
                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">HOUSE NAME</label>
                    <input type="text" class="form-control" id="inputHousename" placeholder="House Name"
                        name="house_name" value="{{ $applicant->house_name }}">
                    @error('house_name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">STREET NAME</label>
                    <input type="text" class="form-control" id="inputStreet_name" placeholder="Street Name"
                        name="street_name" value="{{ $applicant->street_name }}">
                    @error('street_name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row ">
                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">POSTOFFICE</label>
                    <input type="text" class="form-control" id="inputPostOffice" placeholder="Post Office"
                        name="post_office" value="{{ $applicant->post_office }}">
                    @error('post_office')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">PINCODE</label>
                    <input type="text" class="form-control" id="inputPin" placeholder="Pin Code" name="pin_code"
                        value="{{ $applicant->pin_code }}">
                    @error('pin_code')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <label for="inputCity" class="m-3">
            <h5 class="text-bold"> Communication Address</h5>
        </label>
        <input type="checkbox" id="temporaryAddressCheckBox" onclick="showTemporaryAdressField()"
            name="differentAddress">
        <label for="inputCity">Same as Above </label>

        <!--    Temporary Address  -->
        <div class="row  mt-3 border p-3" id="temporaryAddress" style="display:visible;">
            <div class="row">
                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">HOUSE NAME</label>
                    <input type="text" class="form-control" id="inputHousename" placeholder="House Name"
                        name="tempHouse_name" value={{ old('tempHouse_name') }}>
                    @error('tempHouse_name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">STREET NAME</label>
                    <input type="text" class="form-control" id="inputStreet_name" placeholder="Street Name"
                        name="tempStreet_name" value={{ old('tempStreet_name') }}>
                    @error('tempStreet_name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row ">
                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">POSTOFFICE</label>
                    <input type="text" class="form-control" id="inputPostOffice" placeholder="Post Office"
                        name="tempPost_office" value={{ old('tempPost_office') }}>
                    @error('tempPost_office')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group col-md-6 mt-3">
                    <label for="inputCity">PINCODE</label>
                    <input type="text" class="form-control" id="inputPin" placeholder="Pin Code"
                        name="tempPin_code" value={{ old('tempPin_code') }}>
                    @error('tempPin_code')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Temporaty address ends -->
        <div class="row ">
            <div class="form-group col-md-4 mt-3">
                <label for="inputCity">VILLAGE</label>
                <input type="text" class="form-control" id="inputCity" placeholder="VILLAGE" name="village"
                    value="{{ $applicant->village }}">
                @error('village')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>

            <div class="form-group col-md-4 mt-3">
                <label for="inputCity">TALUK</label>
                <input type="text" class="form-control" id="inputCity" placeholder="TALUK" name="taluk"
                    value="{{ $applicant->taluk }}">
                @error('taluk')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <div class="form-group col-md-4 mt-3">
                <label for="inputZip">DISTRICT</label>
                <select class="form-control form-control-lg" id="inputZip" placeholder="DISTRICT" name="district" required>
                    <option> SELECT YOUR DISTRICT </option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->district }}"> {{ $district->district }} </option>
                    @endforeach
                </select>
                @error('district')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group mt-5 border p-3">
            <label class="fw-bold"> MARITAL STATUS </label>
            <div class="form-check mt-3">
                <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault1" checked
                    value='MARRIED'>
                <label class="form-check-label" for="flexRadioDefault1">
                    MARRIED
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault2"
                    value='UNMARRIED'>
                <label class="form-check-label" for="flexRadioDefault2">
                    UNMARRIED
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault2"
                    value='OTHER'>
                <label class="form-check-label" for="flexRadioDefault2">
                    OTHER
                </label>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="partner_employee" required
                    {{ old('partner_employee') == 'on' ? 'checked' : '' }} value=1>
                <label class="form-check-label">
                    <b> NOT BEING OCCUPANT TO ANY QUARTERS</b>
                </label>
            </div>
        </div>

        <div class="form-group mt-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="radius_five_miles" required
                    {{ old('radius_five_miles') == 'on' ? 'checked' : '' }} value=1>
                <label class="form-check-label" for="gridCheck">
                    <b> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                        MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</b>
                </label>
            </div>
        </div>

        <div class="row mt-3 border p-3">
            <label class="font-weight-bold"> UPLOAD SUPPORTING DOCUMENTS</label>
            <div class="form-group col-md-6 mt-3">
                <input type="file" class="form-control" id="inputMarriageCertificate" name="marriage_certificate">
                @error('marriage_certificate')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
            <label class="text-success">Upload marriage certiticate/Birth certificate of child in pdf format</label>
        </div>

        <div class="form-group col-xl-4 mt-3">
            <label for="mob">MOBILE NUMBER</label>
            <input type="text" class="form-control" id="mob" name="mob" placeholder="MOB "
                maxlength="10" value="{{ $applicant->mob }}" title="Only 10 Digits  allowed">

            @error('mob')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group mt-3 border p-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck" name="declaration" value=1
                    onClick="findAppId()">
                <label class="form-check-label" for="gridCheck">
                    <b> DECLARATION</b>
                    <p>I have read and understood the rules for the allotment and occupation of quarters for police
                        personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
                        Government pay,from time to time ,make in this regard . The information furnished by me above
                        is correct and true to the best of my knowledge and belief
                    </p>
                </label>
                @error('declaration')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="form-group text-center mt-3">
            <button type="submit" class="btn btn-success mx-auto "
                title="Make Sure All Supporting Documents Are Submitted, To Avoid Rejection Of Your Application"
                onClick=" return confirm('Make Sure All Supporting Documents are Submitted, To Avoid Rejection Of Your Application?'); ">
                SUBMIT </button>
        </div>

        <div class="form-group col-md-6 mt-3">
            <input hidden type="text" class="form-control" id="application_no" placeholder="House Name"
                name="application_no" value=>
        </div>
    </form>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/user_application.js"></script>
@endsection
