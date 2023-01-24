@extends('layouts.user-dashboard')
@section('content')
    <div class="modal-content">
        <div class="modal-body fw-bold ">
            <h3 class=" pb-2 text-center pb-md-0 mb-md-5">APPLICATION PREVIEW </h3>

            <form class=" bg-white" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row border p-2">
                    <div class="form-group col-xl-4 mt-3">
                        <label for="inputname">APPLICANT NAME</label>
                        <input type="text" class="form-control" id="inputname" name="applicant_Name"
                            value="{{ $applicant->applicant_Name }}">
                        @error('applicant_Name')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-xl-4 mt-3">
                        <label for="inputpen">PEN</label>
                        <input type="text" class="form-control" id="inputpen" name="pen_No"
                            value="{{ $applicant->pen_No }}">
                        @error('pen_No')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-xl-4 mt-3">
                        <label for="inputrank">RANK </label>
                        <input type="text" class="form-control" id="inputrank" name="rank"
                            value="{{ $applicant->rank }}">
                        @error('rank')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-4 mt-3">
                        <label for="inputpay">PAY</label>
                        <input type="text" class="form-control" id="inputpay" name="pay"
                            value="{{ $applicant->pay }}">
                        @error('pay')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <label for="inputsp">SCALE OF PAY</label>
                        <input type="text" class="form-control" id="inputsp" value="{{ $applicant->scale_Of_Pay }}"
                            name="scale_Of_Pay">
                        @error('scale_Of_Pay')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <label for="inputoffice">Present Office</label>
                        <input type="text" class="form-control" id="inputoffice" value="{{ $applicant->unit }}"
                            name="present_Office">
                        @error('present_Office')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-md-6 mt-2">
                        <label for="inputdob">DATE OF BIRTH</label>
                        <input type="date" class="form-control" id="inputdob" value="{{ $applicant->date_Of_Birth }}"
                            name="date_Of_Birth">
                        @error('date_Of_Birth')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-6 mt-2">
                        <label for="inputsa">DATE OF SUPERANNUATION</label>
                        <input type="date" class="form-control" id="inputsa"
                            value="{{ $applicant->date_Of_Superannuation }}" name="date_Of_Superannuation">
                        @error('date_Of_Superannuation')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- Address -->
                <div class="row  mt-3 border p-1 mt-2">
                    <label for="inputCity">Permenant Address </label>
                    <div class="row ">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputCity">HOUSE NAME </label>
                            <input type="text" class="form-control" id="inputHousename"
                                value="{{ $applicant->house_Name }}" name="house_Name">
                            @error('house_Name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mt-3">
                            <label for="inputCity">STREET NAME</label>
                            <input type="text" class="form-control" id="inputStreat_name" name="streat_Name"
                                value={{ $applicant->streat_Name }}>
                            @error('streat_Name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    <div class="row ">
                        <div class="form-group col-md-6 mt-3">
                            <label for="inputZip">POST OFFICE</label>
                            <input type="text" class="form-control" id="inputPostOffice"
                                value="{{ $applicant->post_Office }}" name="post_Office">
                            @error('post_Office')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group col-md-6 mt-3">
                            <label for="inputZip">PINCODE</label>
                            <input type="text" class="form-control" id="inputPin"
                                value="{{ $applicant->pin_Code }}" name="pin_Code">
                            @error('pin_Code')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-md-4 mt-3">
                        <label for="inputCity">VILLAGE</label>
                        <input type="text" class="form-control" id="inputCity" value="{{ $applicant->village }}"
                            name="village">
                        @error('village')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group col-md-4 mt-3">
                        <label for="inputCity">TALUK</label>
                        <input type="text" class="form-control" id="inputCity" value="{{ $applicant->taluk }}"
                            name="taluk">
                        @error('taluk')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group col-md-4 mt-3">
                        <label for="inputZip">DISTRICT</label>
                        <input type="text" class="form-control" id="inputZip" value="{{ $applicant->district }}"
                            name="district">
                        @error('district')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="form-group mt-5 border p-3">
                    <label class="fw-bold"> MARITAL STATUS </label>

                    <div class="form-check mt-3">
                        <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault1"
                            checked value='MARRIED'>
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
                    <div class="checkbox">
                        <input class="form-check-input" type="checkbox" checked data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" name="partner_Employee">
                        <b> NOT BEING OCCUPANT TO ANY QUARTERS</b>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <div class="form-check">
                        <input class="form-check-input" checked type="checkbox" id="gridCheck" name="radius_Five_Miles">
                        <label class="form-check-label" for="gridCheck">
                            <b> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                                MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</b>
                        </label>
                    </div>
                </div>

                <div class="form-group col-xl-4 mt-3">
                    <label for="inputrank"> QUARTERS PRIORITY </label>
                    <input type="text" name="priority" value="{{ $applicant->priority }}">
                </div>
                <div class="form-group mt-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck" name="declaration" value=1
                            checked>
                        <label class="form-check-label" for="gridCheck">
                            <b> DECLARATION</b>
                            <p>I have read and understood the rules for the allotment and occupation of quarters for police
                                personnel in kerala.I hereby declare that i shall abide by the said rules and all other
                                rules
                                Government pay,from time to time ,make in this regard . The information furnished by me
                                above
                                is correct and true to the best of my knowledge and belief
                            </p>
                        </label>
                        @error('declaration')
                            <p class="text-danger"> {{ $message }}</p>
                        @enderror
                    </div>
                </div>
        </div>
        </form>
    </div>
</div>
@endsection
