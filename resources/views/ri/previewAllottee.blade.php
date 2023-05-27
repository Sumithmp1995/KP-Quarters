@extends('layouts.ri-dashboard')
@section('content')
    <form class=" bg-white border border-info">
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

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname"> MOBILE NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" name="mobile" value="{{ $allottee->mob }}" readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 text-center" style="width: 160px;">
                    <div class="row p-1 text-center" style="height: 160px;">
                        <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>
                    </div>
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
                    <label for="inputname"> QUARTERS TYPE</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->type }}  QUARTERS"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CLASS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->class }}" readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS ALLOTMENT PROCEEDINGS No. </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile" value="{{ $allottee->proceedings_no }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS ALLOTMENT PROCEEDINGS </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $allottee->proceedings_doc) }}" class="btn btn-block border" target="_blank"><u>
                            Click to download </u></a>
                </div>
            </div>
        </div>
    </form>

    @if ($allottee->remember_token == 8)
        <div class="row p-3">
           <div class="d-flex justify-content-center"> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#handoverKeyModal"> Hand over key </button>     </div>
            <span class="ml-3"> <button type="button" class="btn btn-secondary  p-3"> Print Application
                </button> </span>
        </div>
    @endif

  <!-- Modal -->
  <div class="modal fade" id="handoverKeyModal" tabindex="-1" role="dialog" aria-labelledby="handoverKeyModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-bg-warning">
          <h5 class="modal-title" id="exampleModalLabel"> Handover Key </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          You are just about to complete the allotment process. Confirm your action !
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
          <a class="btn btn-primary btn btn-primary col-md-2 p3"
          href=" {{ route('ri-handover_key', [$allottee->id]) }} "> Confirm  </a>
        </div>
      </div>
    </div>
  </div>
  
@endsection
