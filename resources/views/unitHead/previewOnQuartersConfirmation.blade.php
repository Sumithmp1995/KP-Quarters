@extends('layouts.unitHead-dashboard')
@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="d-flex justify-content-center">
                <h4> New Allottee Details </h4>
            </div>
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
                        <input type="text" class="form-control" id="inputoffice" value="{{ $allottee->present_unit }}"
                            name="present_Office" readonly>
                    </div>
                </div>

                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> MOBILE NUMBER</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" name="mobile" value="{{ $allottee->mob }}" readonly>
                    </div>
                </div>
            </div>

            <div class="col-md-3 text-center" style="width: 180px;">
                <div class="row p-1 text-center" style="height: 180px;">
                    <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded" alt="Cinque Terre"
                        readonly>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            <h4> Quarters Details </h4>
        </div>
        <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
            <div class="container-fluid m-2">
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> QUARTERS NAME</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_name }}"
                            readonly>
                    </div>
                </div>
                <div class="row p-1 border ">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> QUARTERS NUMBER</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_no }}"
                            readonly>
                    </div>
                </div>
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> QUARTERS CATEGORY</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" name="priority" value="{{ $quarters->class }}" readonly>
                    </div>
                </div>
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> QUARTERS TYPE</label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <input type="text" class="form-control" name="priority" value="{{ $quarters->type }}"
                            readonly>
                    </div>
                </div>
                <div class="row p-1 border  d-flex justify-content-center">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> STATUS</label>
                    </div>
                    <div class="col-md-6 ml-auto ">
                        <input type="text" class="form-control " name="priority"
                            value="{{ $quarters->status == 0 ? 'Not Occupied' : 'Allottee : ' . $allottee->applicant_name }} "
                            readonly>
                    </div>
                </div>
                <div>
                    @if ($priorityStatus)
                        <h4 class="text-bg-success p-2 d-flex justify-content-center ">
                            Quarters available within the priority list of the applicant. </h4>
                    @else
                        <h4 class="text-bg-danger p-2 d-flex justify-content-center ">
                            Quarters allocated not within the priority list of the applicant. </h4>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-center mb-3">
                <a href="{{ route('unitHead-home') }}" class="btn btn-primary"> Home</a>
            </div>
        </form>
    </div>
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
                    <h5 class="modal-title" id="exampleModalLabel"> Allotment info </h5>
                </div>
                <div class="modal-body">
                    <h5> New Allottee Found !</h5>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"> Ok </button>
                </div>
            </div>
        </div>
    </div>
@endsection
