@extends('layouts.ri-dashboard')
@section('content')
    <form class=" bg-white border border-info">
        <div class="container-fluid">
            <div class="row">
                <div class="text-bg-success d-flex justify-content-center">
                    <h4> Occupant Details </h4>
                </div>
                <div class="col-md-9 ml-auto">
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICANT NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $previewData->applicant_name }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">APPLICATION NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                value="{{ $previewData->application_no }}" readonly>
                        </div>
                    </div>

                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PEN</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputpen" name="pen_No"
                                value="{{ $previewData->pen }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">RANK & GL NO</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputrank" name="rank"
                                value="{{ $previewData->rank }}  &nbsp {{ $previewData->gl_no }} " readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname">PRESENT OFFICE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" id="inputoffice"
                                value="{{ $previewData->present_unit }}" name="present_Office" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label for="inputname"> MOBILE NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" name="mobile" value="{{ $previewData->mob }}"
                                readonly>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 text-center" style="width: 160px;">
                    <div class="row p-1 text-center" style="height: 160px;">
                        <img src="{{ asset('storage/' . $previewData->photo) }}" class="img-thumbnail rounded"
                            alt="Cinque Terre" readonly>
                    </div>
                </div>
            </div>

            <!-- quarters details -->
            <div class="text-bg-success d-flex justify-content-center">
                <h4> Quarters Details </h4>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $previewData->quarters_no }}"
                        readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NAME</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $previewData->quarters_name }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS TYPE</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $previewData->type }} QUARTERS"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CLASS</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $previewData->class }}" readonly>
                </div>
            </div>


            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS ALLOTMENT PROCEEDINGS No. </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="mobile"
                        value="{{ $previewData->proceedings_no }}" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> ALLOTMENT PROCEEDINGS </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $previewData->proceedings_doc) }}" class="btn btn-block border" target="_blank"><u>
                            Click to preview </u></a>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">KSEB No-Dues Documents </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $previewData->kseb_noDues) }}" class="btn btn-block border" target="_blank"><u> Click
                            to preview </u></a>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname">WATER AUTHORITY No-Dues Documents </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <a href="{{ asset('storage/' . $previewData->kwa_noDues) }}" class="btn btn-block border" target="_blank"><u> Click
                            to preview </u></a>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> ASSET REGISTER </label>
                </div>
                <div class="col-md-6 ml-auto d-flex justify-content-center">
                    <button type="button" data-toggle="modal" data-target="#assetModal">
                        Assets Details
                    </button>
                </div>
            </div>
        </div>
    </form>

    <div class=" d-flex justify-content-center p-3">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#riApproveVacate"> Approve
            Request </button>
    </div>

    <!-- Button trigger approve modal -->
    <div class="modal fade" id="riApproveVacate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning p-3">
                    <h5 class="modal-title" id="exampleModalLabel"> Approve vacate request </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    After confirming the request, it will be send to unit head for final approval.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href=" {{ route('ri-approveVacate', [$vacatteeId]) }} " class="btn btn-primary col-md-4 p3">
                        Confirm </a>
                </div>
            </div>
        </div>
    </div>

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
