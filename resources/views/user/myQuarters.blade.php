@extends('layouts.user-dashboard')
@section('content')
    <h4 class="text-center pb-md-0 mb-md-5"> ALLOTMENT PREVIEW </h4>
    <form class=" bg-white border border-info">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 text-center" style="width: 190px;">
                    <div class="row p-1 text-center" style="height: 190px;">
                        <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded" alt="Cinque Terre"
                            readonly>
                    </div>
                </div>
                <div class="col-md-9 ml-auto">
                    <div class="row  border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICANT NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $allottee->applicant_name }}" readonly>
                        </div>
                    </div>
                    <div class="row border">
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
                                value="{{ $allottee->rank }} &nbsp {{ $allottee->gl_no }} " readonly>
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
                            <label for="inputname">DATE OF SUPERANNUATION</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputsa"
                                value="{{ $allottee->date_of_superannuation }}" name="date_Of_Superannuation" readonly>
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
            </div>

            <div class="text-bg-success d-flex justify-content-center">
                <h4> Quarters Details </h4>
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
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->quarters_no }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS TYPE</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->type }} QUARTERS"
                        readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CLASS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $allottee->class }}"
                        readonly>
                </div>
            </div>

            @if ($allottee->proceedings_no)
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
                        <label for="inputname"> ALLOTMENT PROCEEDINGS </label>
                    </div>
                    <div class="col-md-6 ml-auto">
                        <a href="{{ asset('storage/' . $allottee->proceedings_doc) }}" class="btn btn-block border" target="_blank"><u>
                                Click to Download</u></a>
                    </div>
                </div>
                <div class="row p-1 border">
                    <div class="col-md-6 ml-auto">
                        <label for="inputname"> ASSETS REGISTER </label>
                    </div>
                    <div class="col-md-6 ml-auto d-flex justify-content-center">
                        <button type="button" data-toggle="modal" data-target="#assetModal">
                            Assets Details
                        </button>
                    </div>
                </div>
            @endif
        </div>
    </form>

    
    <!-- Asset Modal -->
    <div class="modal fade" id="assetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header  text-bg-primary d-flex justify-content-center ">
                    <h4 class="modal-title" id="exampleModalLongTitle">Assets Details</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col"> ITEM NAME </th>
                                <th scope="col"> ITEM TYPE </th>
                                <th scope="col"> ITEM COUNT </th>
                                <th scope="col"> REMARK </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($assets as $asset)
                                <tr>
                                    <th scope="row"> {{ $asset->id }} </th>
                                    <td> {{ $asset->asset_name }} </td>
                                    <td> {{ $asset->asset_type }} </td>
                                    <td> {{ $asset->count }} </td>
                                    <td> {{ $asset->remark }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
