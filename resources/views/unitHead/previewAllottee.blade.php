@extends('layouts.unitHead-dashboard')
@section('content')
    <form class=" bg-white border border-info" >
        <div class="container-fluid">
            <div class="row m-1">
                <div class="col-md-9 ml-auto">
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICANT NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $allottee->applicant_name }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICATION NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $allottee->application_no }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputpen" name="pen_No"
                                value="{{ $allottee->pen }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputrank" name="rank"
                                value="{{ $allottee->rank }}  &nbsp {{ $allottee->gl_no }} " readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PRESENT OFFICE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputoffice"
                                value="{{ $allottee->present_unit }}" name="present_Office" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 text-center" style="width: 160px;">
                        <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">NOT BEING OCCUPANT TO ANY QUARTERS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $allottee->partner_employee ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> NOT OWNING A HOUSE WITHIN A RADIUS OF FIVE
                        MILES/EIGHT KILOMETERS FROM OFFICE CURRENTLY WORKING</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" id="inputoffice"
                        value="{{ $allottee->radius_five_miles ? 'YES' : 'NO' }}" name="present_Office" readonly>
                </div>
            </div>
            <div class=" d-flex justify-content-center  font-weight-bold">
                <h5> QUARTERS DETAILS </h5>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->quarters_no }}"
                        readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NAME</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->quarters_name }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CLASS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $allottee->class }} " readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CLASS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $allottee->type }} QUARTERS"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> UNIT </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $allottee->present_unit }}"
                        readonly>
                </div>
            </div>
        </div>
    </form>

    @if ($allottee->remember_token == 5)
        <div class="row d-flex justify-content-center p-3">
            <button type="button" class="btn btn-primary col-md-2 p3" data-toggle="modal" data-target="#allotteModal"
                data-whatever="@mdo">
                Upload Proceedings </button>
            <span class="ml-3"> <button type="button" class="btn btn-secondary col-md-2  p-3"> Print Application
                </button> </span>
        </div>
    @else
        <div class="d-flex justify-content-center m-3">
            <a href="{{ route('unitHead-home') }}" class="btn btn-success"> Home</a>
        </div>
    @endif


    <!-- UnitHead quarters allotment modal   -->
    <div class="modal fade" id="allotteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header  text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel">UPLOAD SUPPORTING DOCUMENTS TO COMPLETE THE ALLOTMENT
                        PROCESS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body border p-3 ">
                    <!-- Proceeeding input form  -->
                    <form action="{{ route('unitHead-uploadProceedings', [$allottee->allottee_id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="ml-3">
                            <div class="form-group col-xl-6 mt-3">
                                <label for="inputname">PROCEEDINGS No.</label>
                                <input type="text" class="form-control" id="proceedings_no" name="proceedings_no"
                                    placeholder="ENTER PROCEEDINGS No." value="{{ old('proceedings_no') }}" required>
                                @error('proceedings_no')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group col-xl-6 mt-3">
                                <label class="font-weight-bold m-2"> SUPPORTING DOCUMENT </label>
                                <input type="file" class="form-control" id="proceedings_doc" name="proceedings_doc"
                                    required>
                                @error('proceedings_doc')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                                <label class="text-success"> file should be .pdf format</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"> Complete Allotment process </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
