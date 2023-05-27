@extends('layouts.user-dashboard')
@section('content')
    <!---reject    ---------------------------->
    <div id="rejectWillingnessModal" role="dialog">
        <div role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-danger">
                    <h4 class="modal-title" id="exampleModalLabel"> YOU HAVE OPTED TO REJECT THE QUARTERS.
                    </h4>
                </div>
                <div class="modal-body">
                    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-9 ml-auto">

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname">APPLICANT NAME</label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                                value="{{ $data->applicant_name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname">APPLICATION NUMBER</label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                                value="{{ $data->application_no }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname">PEN</label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <input type="text" class="form-control" id="inputpen" name="pen_No"
                                                value="{{ $data->pen }}" readonly>
                                        </div>
                                    </div>

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname">RANK & GL NO</label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <input type="text" class="form-control" id="inputrank" name="rank"
                                                value="{{ $data->rank }}  &nbsp {{ $data->gl_no }} " readonly>
                                        </div>
                                    </div>

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname">PRESENT OFFICE</label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <input type="text" class="form-control" id="inputoffice"
                                                value="{{ $data->present_unit }}" name="present_Office" readonly>
                                        </div>
                                    </div>

                                    <div class="row p-1 border">
                                        <div class="col-md-6 ml-auto">
                                            <label for="inputname"> QUARTERS PRIORITY </label>
                                        </div>
                                        <div class="col-md-6 ml-auto">
                                            <b>1. @if($data['p1']) {{ $data['p1'] }} @else NOT SELECTED @endif </b> <br>
                                            <b> 2. @if($data['p2']) {{ $data['p2'] }} @else NOT SELECTED @endif </b> <br>
                                            <b> 3. @if($data['p3']) {{ $data['p3'] }} @else NOT SELECTED  @endif </b> <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3 text-center" style="width: 160px;">
                                    <div class="row p-1 text-center" style="height: 160px;">
                                        <img src="{{ asset('storage/' . $data->photo) }}" class="img-thumbnail rounded"
                                            alt="Cinque Terre" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="text-bg-secondary d-flex justify-content-center m-2">
                                <h4> Quarters Details </h4>
                            </div>

                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname"> QUARTERS NAME</label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="priority"
                                        value="{{ $data->quarters_name }}" readonly>
                                </div>
                            </div>
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname"> QUARTERS NUMBER</label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="priority"
                                        value="{{ $data->quarters_no }}" readonly>
                                </div>
                            </div>
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname">  TYPE</label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="priority"
                                        value="{{ $data->type }} QUARTERS " readonly>
                                </div>
                            </div>

                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname">  CLASS</label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="priority"
                                        value="{{ $data->class }}" readonly>
                                </div>
                            </div>
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname"> STATUS </label>
                                </div>

                                @if ($priorityStatus)
                                    <div class="col-md-6 ml-auto">
                                        <p class="text-bg-success p-3"> The Quarters allotted within your priority list </p>
                                    </div>
                                @else
                                    <div class="col-md-6 ml-auto">
                                        <p class="text-bg-danger p-3"> " The allotted quarters doesn't match with your
                                            priority list" </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </form>

                    <form>
                        <div class="modal-footer">
                            <a href={{ route('user-willingness') }} class="btn btn-secondary"> Back</a>

                            @if ($priorityStatus)
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#finalRejectModal" onclick="checkRejectDeclaration()"> Reject </button>
                            @else
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#firstRejectModal" onclick="checkRejectDeclaration()"> Reject </button>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!---------------------       First reject Modal           ------------------->
    <div class="modal fade" id="firstRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Reject Quarters allocation</h5>
                </div>
                <div class="modal-header text-bg-danger">
                    <h4 class="modal-title p-3" id="exampleModalLabel">
                        സീനിയോറിറ്റി ലിസ്റ്റ് പ്രകാരം നിങ്ങൾക്കായി അനുവദിക്കപ്പെട്ടിരിക്കുന്ന ഒഴിവുവന്ന ക്വാർട്ടേഴ്‌സ്
                        സ്വീകരിക്കാൻ നിങ്ങൾ തയാറല്ല എന്ന് തീരുമാനിക്കുകയാണ്.
                        ഇത് പ്രകാരം നിങ്ങൾ മുൻഗണന കൊടുത്തിരിക്കുന്ന ക്വാർട്ടേഴ്‌സ് ഒഴിവു വരുമ്പോൾ മാത്രം നിങ്ങളെ
                        പരിഗണിക്കുന്നതാണ്. <br>
                        ഈ ഓപ്ഷൻ സെലക്ട് ചെയ്യുകയാണെങ്കിൽ ഒരു അവസരത്തിലും ഒഴിവുവരുന്ന മറ്റു ക്വാർട്ടസിലേക്ക് നിങ്ങളെ
                        പരിഗണിക്കുന്നതല്ല.
                        <br> If you proceed to confirm rejection, You will be allocated the quarters when ever the quarters
                        in your Priority list become vacant </h6>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('user-firstRejectWilling', [$data->id]) }}" method="POST">
                        @csrf
                        <div class="form-group mt-3 border p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="declaration"
                                    onclick="checkRejectDeclaration()" name="declaration" required value="declaration">
                                <label class="form-check-label" for="gridCheck">
                                    <b> DECLARATION</b>
                                    <p>I'm decided to reject the quarters which has been alloted based on my seniority. <br>
                                        I have read and understood the quarters allotment prolicy. <br>
                                        The information furnished by me above is correct and true to the best of my
                                        knowledge and belief
                                    </p>
                                </label>
                                <p id="error" class="text-danger"> </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href={{ route('user-willingness') }} class="btn btn-secondary"> Back</a>
                            <button type="submit" class="btn btn-primary"> Confirm Rejection </button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>



    <!------------------------------       Final reject Modal            -------------------------------->
    <div class="modal fade" id="finalRejectModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Reject Quarters allocation Permanently </h5>
                </div>
                <div class="modal-header text-bg-danger">
                    <h4 class="modal-title p-3" id="exampleModalLabel">
                        സീനിയോറിറ്റി ലിസ്റ്റ് പ്രകാരം നിങ്ങൾക്കായി അനുവദിക്കപ്പെട്ടിരിക്കുന്ന ഒഴിവുവന്ന ക്വാർട്ടേഴ്‌സ്
                        സ്വീകരിക്കാൻ നിങ്ങൾ തയാറല്ല എന്ന് തീരുമാനിക്കുകയാണ്.
                        അനുവദിക്കപ്പെട്ടത് നിങ്ങൾ മുൻഗണന കൊടുത്തിരിക്കുന്ന ക്വാർട്ടേഴ്‌സ് ആയതിനാൽ REJECT ഓപ്ഷൻ സെലക്ട്
                        ചെയ്യുകയാണെങ്കിൽ നിങ്ങളുടെ അപേക്ഷ അസാധു ആകുന്നതും സീനിയോറിറ്റി ലിസ്റ്റിൽ നിന്നും നിങ്ങളെ
                        പൂർണമായി ഒഴിവാക്കുന്നതുമാണ് <br> If you proceed to confirm rejection, Your application will be
                        invalidated and expelled from seniority list </h6>
                </div>
                <div class="modal-body">
                    <form action=" {{ route('user-finalRejectWilling', [$data->id]) }}" method="POST">
                        @csrf
                        <div class="form-group mt-3 border p-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="declaration"
                                    onclick="checkRejectDeclaration()" name="declaration" required value="declaration">
                                <label class="form-check-label" for="gridCheck">
                                    <b> DECLARATION</b>
                                    <p>I'm decided to reject the quarters which has been alloted based on my seniority. <br>
                                        I have read and understood the quarters allotment prolicy. <br>
                                        The information furnished by me above is correct and true to the best of my
                                        knowledge and belief
                                    </p>
                                </label>
                                <p id="error" class="text-danger"> </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a href={{ route('user-willingness') }} class="btn btn-secondary"> Back</a>
                            <button type="submit" class="btn btn-primary"> Confirm Rejection </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script>
        function checkRejectDeclaration() {
            let dec = document.getElementById("declaration");
            if (dec.checked) {
                document.getElementById('error').innerHTML = " You are going to reject the quarters. ";
            } else {
                document.getElementById('error').innerHTML = " You must check declaration before proceed";
            }
        }
    </script>
@endsection
