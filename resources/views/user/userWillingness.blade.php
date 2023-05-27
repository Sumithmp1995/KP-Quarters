@extends('layouts.user-dashboard')
@section('content')
    <div class=" bg-white" style="min-height :500px;">
        <div class="text-center">
            <table class="table table-striped mb-0">
                <thead style="background-color: #2c81f0;">
                    <tr>
                        <th scope="col">QUARTERS NAME</th>
                        <th scope="col">QUARTERS No.</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">CLASS</th>
                        <th scope="col">APPLICATION No.</th>
                        <th scope="col">QUARTERS ISSUED ON </th>
                        <th scope="col">CONFIRM </th>
                        <th scope="col">REJECT </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $data->quarters_name }}</td>
                        <td>{{ $data->quarters_no }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->class }}</td>
                        <td>{{ $data->application_no }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#confirmWillingnessModal" data-whatever="@mdo"> CONFIRM </button>
                        </td>
                        <td>
                            <a class="btn btn-danger" href=" {{ route('user-rejectWillingnessForm', [$data->id]) }}"> REJECT </a> 
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


    <!---------------------    confirmation  modal    --------------------------->
    <div class="modal fade" id="confirmWillingnessModal" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel"> Quarters confirmation preview</h4>
                </div>
                <div class="modal-body">
                    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
                        <div class="container-fluid">
                            <div class="row">
                                
                                <div class="col-md-3 text-center" style="width: 160px;">
                                    <div class="row p-1 text-center" style="height: 160px;">
                                        <img src="{{ asset('storage/' . $data->photo) }}" class="img-thumbnail rounded"
                                            alt="Cinque Terre" readonly>
                                    </div>
                                </div>
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
                                            <b>1.  @if($data['p1']) {{ $data['p1'] }} @else NOT SELECTED @endif </b> <br>
                                           <b> 2. @if($data['p2']) {{ $data['p2'] }} @else NOT SELECTED @endif </b> <br>
                                          <b>  3.@if($data['p3']) {{ $data['p3'] }} @else NOT SELECTED @endif </b>  <br>
                                        </div>
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
                                    <label for="inputname"> QUARTERS TYPE</label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="priority"
                                        value="{{ $data->type }}" readonly>
                                </div>
                            </div>
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label for="inputname"> QUARTERS CLASS</label>
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

                                @if($priorityStatus)
                                <div class="col-md-6 ml-auto">
                                    <p class="text-bg-success p-3"> The Quarters allotted within your priority list </p>
                                </div>
                                @else 
                                <div class="col-md-6 ml-auto">
                                    <p class="text-bg-danger p-3"> " The allotted quarters doesn't match with your priority list" </p>
                                </div>
                                @endif
                            </div>
                            <div class="row p-1 border">
                            </div>
                        </div>
                    </form>

                <form action="{{ route('user-confirmWilling' ,$data->id)  }}"  >
                    <div class="form-group mt-3 border p-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="declaration" name="declaration" required value="declaration">
                            <label class="form-check-label" for="gridCheck">
                                <b> DECLARATION</b>
                                <p>I have read and understood the rules for the allotment and occupation of quarters for police
                                    personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
                                    Government pay,from time to time ,make in this regard . The information furnished by me above
                                    is correct and true to the best of my knowledge and belief
                                </p>
                            </label>
                            <p id="error" class="text-danger"> </p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    <button type="submit" class="btn btn-primary" onclick="checkDeclaration()"> Confirm </button> 
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
  <!---------------------------------     modal confirm ends   ---------------------------->


    <script>
  function checkDeclaration() {
   let dec = document.getElementById("declaration");
    if(dec.checked ) {
        document.getElementById('error').innerHTML = " ";
    }else {
        document.getElementById('error').innerHTML = " You must check declaration before proceed";
         }
        }     
    </script>
@endsection
