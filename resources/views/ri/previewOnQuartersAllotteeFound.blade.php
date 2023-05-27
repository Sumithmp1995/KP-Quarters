@extends('layouts.ri-dashboard')
@section('content')
    <div class="alert alert-success">
        Quarters has been added. Following applicant allotted the same Successfully !
        <div class="d-flex justify-content-end"> <a href=" {{ route('ri-home') }}"> <button type="button"
                    class="btn btn-primary"> Home </button> </a> </div>
    </div>

    <h5 class="  text-center pb-md-0 mb-md-3"> Quarters Allocation Status </h5>
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

    <script type="text/javascript">
        window.onload = function() {
            OpenBootstrapPopup();
        };
        function OpenBootstrapPopup() {
            $("#allotteeFoundOnLoad").modal('show');
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="allotteeFoundOnLoad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> Info </h5>
                </div>
                <div class="modal-body">
                    <h5> New Allottee Found !</h5>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> close </button>
                </div>
            </div>
        </div>
    </div>
@endsection
