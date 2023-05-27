@extends('layouts.user-dashboard')
@section('content')
    <!-- modal  -->
    <div>
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="p-3">

                    <h5 class=" pb-2 text-center pb-md-0 mb-md-5">APPLICATION PREVIEW </h5>
                    <!-- codepen form -->
                    <div>
                        <div class="well form-horizontal" id="contact_form">
                            <fieldset>
                                <b> APPLICATION No. : {{ $formdata['application_no'] }} </b>
                                <!-- Text input-->
                                <div class="">
                                    <div class="">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="card-body ">
                                                    <div class="text-center">
                                                        <img src="{{ asset('storage/' . $formdata->photo) }}" alt="avatar"
                                                            class="rounded-circle img-fluid" style="width: 150px;">
                                                    </div>

                                                    <div class="row">
                                                        <b class="mb-4">
                                                            NAME:
                                                            <input name="first_name"
                                                                value="{{ $formdata['applicant_name'] }}"
                                                                class="form-control" type="text"> </b>
                                                        <b class="mb-4">
                                                            PEN:<input name="first_name" value="{{ $formdata['pen'] }}"
                                                                class="form-control" type="text"> </b>

                                                        <p class="text-muted mb-4">TYPE:<input name="first_name"
                                                                value="{{ $formdata['applicant_type'] }}"
                                                                class="form-control" type="text"></p>
                                                        <p class="text-muted mb-1">RANK<input name="first_name"
                                                                value="{{ $formdata['rank'] }}" class="form-control"
                                                                type="text"></p>

                                                        @if ($formdata['gl_no'])
                                                            <p class="text-muted mb-4">GL NO<input name="first_name"
                                                                    value="{{ $formdata['gl_no'] }}" class="form-control"
                                                                    type="text"></p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> MARITAL STATUS </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group mt-3">
                                                <input type="radio" name="hosting" value="yes" checked>
                                                @if ($formdata['marital_status'] == 'MARRIED')
                                                    <b> MARRIED</b>
                                                @elseif($formdata['marital_status'] == 'UNMARRIED')
                                                    <b> UNMARRIED</b>
                                                @else
                                                    <b> OTHER</b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> MOTHER UNIT </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['mother_unit'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> CURRENT WORKING STATUS </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                @if ($formdata['working_status'])
                                                    <span class="input-group-addon"></span>
                                                    <input name="first_name" value="{{ $formdata['working_status'] }}"
                                                        class="form-control" type="text">
                                                @else
                                                    <input type="radio" name="mu" value="yes" checked
                                                        class="pl-3">
                                                    <b> MOTHER UNIT</b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> SCALE OF PAY </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['scale_of_pay'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> BASIC PAY </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['pay'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> DATE OF BIRTH </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['date_of_birth'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> DATE OF JOINING </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['date_of_joining'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> DATE OF SUPERANNUATION </label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name"
                                                    value="{{ $formdata['date_of_superannuation'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="border p-2">
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label"> PERMANENT ADDRESS </label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input name="first_name" value="{{ $formdata['house_name'] }}"
                                                        class="form-control" type="text">
                                                </div>
                                                <div class="input-group mt-1">
                                                    <span class="input-group-addon"></span>
                                                    <input name="first_name" value="{{ $formdata['street_name'] }}"
                                                        class="form-control" type="text">
                                                </div>
                                                <div class="input-group mt-1">
                                                    <span class="input-group-addon"></span>
                                                    <input name="first_name" value="{{ $formdata['post_office'] }}"
                                                        class="form-control" type="text">
                                                </div>
                                                <div class="input-group mt-1">
                                                    <span class="input-group-addon"></span>
                                                    <input name="first_name" value="{{ $formdata['pin_code'] }}"
                                                        class="form-control" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border p-2">
                                        <div class="form-group ">
                                            <label class="col-md-4 control-label"> COMMUNICATION ADDRESS </label>
                                            <div class="col-md-8 inputGroupContainer">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    @if ($formdata['differentAddress'] == 0)
                                                        <input name="first_name"
                                                            value="{{ $formdata['house_name'] }} {{ $formdata['street_name'] }}  {{ $formdata['post_office'] }} PO"
                                                            class="form-control" type="text">
                                                    @else
                                                        <input name="first_name" value="{{ $formdata['tempAddress'] }}"
                                                            class="form-control" type="text">
                                                    @endif
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> VILLAGE</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['village'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> TALUK</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['taluk'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> DISTRICT</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                <input name="first_name" value="{{ $formdata['district'] }}"
                                                    class="form-control" type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> Current Occupation Status</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group mt-3 border  p-3">
                                                @if ($formdata['partner_employee'])
                                                    <b> NOT BEING OCCUPANT TO ANY QUARTERS OWNED BY STATE GOVT/ CENTRAL GOVT
                                                    </b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> Permanent Residential Status</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group mt-3 border  p-3">
                                                @if ($formdata['radius_five_miles'])
                                                    <b> NOT OWNING A HOUSE WITHIN A RADIUS OF 5 MILES/ 8 Km FROM OFFICE
                                                        CURRENTLY WORKING </b>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border p-3">
                                    <span class="d-flex justify-content-center font-weight-bold p-3"> Quarters Priority
                                    </span>
                                    <!-- Quarters priority -->
                                    <div class="form-group pt-2">
                                        <label class="col-md-4 control-label"> Priority 1</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                @if ($formdata['p1'])
                                                    <input name="first_name" value="{{ $formdata['p1'] }}"
                                                        class="form-control" type="text">
                                                @else
                                                    <input name="first_name" value=" NOT SELECTED " class="form-control"
                                                        type="text">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> Priority 2</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                @if ($formdata['p2'])
                                                    <input name="first_name" value="{{ $formdata['p2'] }}"
                                                        class="form-control" type="text">
                                                @else
                                                    <input name="first_name" value=" NOT SELECTED " class="form-control"
                                                        type="text">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Text input-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"> Priority 3</label>
                                        <div class="col-md-8 inputGroupContainer">
                                            <div class="input-group">
                                                <span class="input-group-addon"></span>
                                                @if ($formdata['p3'])
                                                    <input name="first_name" value="{{ $formdata['p3'] }}"
                                                        class="form-control" type="text">
                                                @else
                                                    <input name="first_name" value=" NOT SELECTED " class="form-control"
                                                        type="text">
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Text input-->
                                <div class="form-group  border mt-2 p-3">
                                    <label class="col-md-4 control-label"> DECLARATION </label>
                                    <div class="col-md-8 inputGroupContainer">
                                        <div class="input-group">

                                            <b> I have read and understood the rules for the allotment and occupation of
                                                quarters for police personnel in kerala.
                                                I hereby declare that i shall abide by the said rules and all other
                                                rules
                                                Government pay,from time to time ,
                                                make in this regard .
                                                The information furnished by me above is correct and true to the best of
                                                my
                                                knowledge and belief
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label"></label>
                            <div class="col-md-4">
                                <a href=" {{ route('user-editApplication', [$formdata]) }}"> <button type="button"
                                        class="btn btn-warning" data-dismiss="modal"> Back </button> </a>

                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#reservationModal">
                                    SUBMIT
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!--codepen form -->
            </div>
        </div>
    </div>


    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> ARE YOU ELIGIBLE FOR ANY RESERVATION ? </h5>
                </div>
                <div class="modal-body">
                    നിങ്ങൾ കംപാഷണെറ്റ്‌ ക്വാർട്ടേഴ്‌സിന് അർഹനാണെങ്കിൽ '<span> Upload Documents </span>' ബട്ടൺ ക്ലിക്ക്
                    ചെയ്ത് അത് തെളിയിക്കുന്ന രേഖകൾ സമർപ്പിക്കുക . <br> <br>
                    അല്ലാത്തപക്ഷം 'Not Eligible' ബട്ടൺ ക്ലിക്ക് ചെയ്യുന്നതിലൂടെ അപേക്ഷ സമർപ്പണം പൂർത്തിയാക്കാവുന്നതാണ്.
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-success mx-auto" data-toggle="modal"
                        data-target="#reservationYesModal" data-whatever="@mdo">
                        Upload Documents
                    </button>
                    <a href=" {{ route('user-home') }}"><button type="button" class="btn btn-primary">
                            Not Eligible </button> </a>
                </div>
            </div>
        </div>
    </div>



    <!-- modal   -->
    <div class="modal fade" id="reservationYesModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header  text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> ARE YOU ELIGIBLE FOR ANY RESERVATION ? </h5>
                </div>
                <div class="modal-body border p-3 ">
                    <!-- Proceeeding input form  -->
                    <form action="{{ route('user-reservation', [$formdata->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class=" row p-4">
                            <div class="form-group col-xl-6 mt-3">
                                <label>SELECT YOUR FIELD</label>
                                <select class="form-control browser-default custom-select" name="reservation" required>
                                    <option value=""> CHOOSE YOUR CRITERIA </option>
                                    <option value="medical"> MEDICAL CRITERIA</option>
                                    <option value="court order">SPECIAL COURT ORDER</option>
                                    <option value="govt order">GOVT ORDER</option>
                                    <option value="dept order">SUPERIOR OFFICER ORDER</option>
                                </select>
                                @error('reservation')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group col-xl-6 mt-3">
                                <label class="font-weight-bold m-2"> SUPPORTING DOCUMENT </label>
                                <input type="file" class="form-control" id="reservation_doc" name="reservation_doc" required>
                                @error('reservation_doc')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                                <label class="text-success"> file should be .pdf format</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary"> SUBMIT </button>
                            </div>
                            <span>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function myFunction() {
            confirm("yOU ARE CONFIRMED TO SUBMIT APPLICATION WITHOUT ANY RESERVATION. ARE YOU SURE TO PROCEED ?");
        }
    </script>
@endsection
