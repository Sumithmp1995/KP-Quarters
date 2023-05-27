@extends('layouts.unitHead-dashboard')
@section('content')
    <form class=" bg-white border border-info">
        @csrf
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 ml-auto">
                    <div class=" d-flex justify-content-center  font-weight-bold m-3">
                        <h5> QUARTERS DETAILS </h5>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->quarters_no }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS NAME</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->quarters_name }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS TYPE</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->type }}  QUARTERS" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS CLASS</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->class }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS TC NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->tc_no }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS KSEB CONSUMER NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->kseb_no }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border">
                        <div class="col-md-6 ml-auto">
                            <label> QUARTERS KSEB CONSUMER NUMBER</label>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <input type="text" class="form-control" value="{{ $quarters->kwa_no }}" readonly>
                        </div>
                    </div>
                    <div class="row p-1 border text-bg-warning">
                        <div class="col-md-6 ml-auto">
                            <label> STATUS </label>
                        </div>
                        @if ($quarters->status == null)
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" value="Not Occupied ">
                            </div>
                        @elseif($quarters->status == 0)
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control"
                                    value=" Confirmation send : {{ $allottee->applicant_name }}">
                            </div>
                        @else
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" value="Occupied">
                            </div>
                        @endif

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 ml-auto">
                    <div class=" d-flex justify-content-center  font-weight-bold mt-5">
                        <div class="d-flex justify-content-center ">
                            <h5> ASSETS DETAILS </h5>
                        </div>
                    </div>
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
                            @php
                                $slNo = 1;
                            @endphp
                            @foreach ($assets as $asset)
                                <tr>
                                    <th scope="row"> {{ $slNo }} </th>
                                    <td> {{ $asset->asset_name }} </td>
                                    <td> {{ $asset->asset_type }} </td>
                                    <td> {{ $asset->count }} </td>
                                    <td> {{ $asset->remark }} </td>
                                </tr>
                                @php
                                    $slNo++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            @if ($quarters->status == '0')
                <div class="row mb-3">
                    <div class=" d-flex justify-content-center text-bg-success font-weight-bold  mb-3">
                        <h5> Conformation Asked to </h5>
                    </div>
                    <div class="col-md-12 ml-auto mt-3">
                        <div class=" pb-4 col-md-3 border">
                            <div class="text-center" style="width: 150px;">
                                <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded"
                                    alt="photo" readonly>
                            </div>
                        </div>
                        <div class="row p-1 border">
                            <div class="ml-auto col-md-6">
                                <label>APPLICANT NAME</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                    value="{{ $allottee->applicant_name }}" readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label>APPLICATION NUMBER</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                    value="{{ $allottee->application_no }}" readonly>
                            </div>

                            <div class="col-md-6 ml-auto">
                                <label>PEN</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputpen" name="pen_No"
                                    value="{{ $allottee->pen }}" readonly>
                            </div>

                            <div class="col-md-6 ml-auto">
                                <label>RANK & GL NO</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputrank" name="rank"
                                    value="{{ $allottee->rank }}  &nbsp {{ $allottee->gl_no }} " readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label>PRESENT OFFICE</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputoffice"
                                    value="{{ $allottee->present_unit }}" name="present_Office" readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label> MOBILE NUMBER</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" name="mobile" value="{{ $allottee->mob }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                </div>
            @elseif($quarters->status == 1)
                <div class="row mb-3">
                    <div class=" d-flex justify-content-center  font-weight-bold">
                        <h5> OCCUPANT DETAILS </h5>
                    </div>
                    <div class="col-md-12 ml-auto mt-3">
                        <div class=" pb-4 col-md-3 border">
                            <div class="text-center" style="width: 150px;">
                                <img src="{{ asset('storage/' . $allottee->photo) }}" class="img-thumbnail rounded"
                                    alt="photo" readonly>
                            </div>
                        </div>
                        <div class="row p-1 border">
                            <div class="ml-auto col-md-6">
                                <label>APPLICANT NAME</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                    value="{{ $allottee->applicant_name }}" readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label>APPLICATION NUMBER</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputname" name="applicant_Name"
                                    value="{{ $allottee->application_no }}" readonly>
                            </div>

                            <div class="col-md-6 ml-auto">
                                <label>PEN</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputpen" name="pen_No"
                                    value="{{ $allottee->pen }}" readonly>
                            </div>

                            <div class="col-md-6 ml-auto">
                                <label>RANK & GL NO</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputrank" name="rank"
                                    value="{{ $allottee->rank }}  &nbsp {{ $allottee->gl_no }} " readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label>PRESENT OFFICE</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" id="inputoffice"
                                    value="{{ $allottee->present_unit }}" name="present_Office" readonly>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label> MOBILE NUMBER</label>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <input type="text" class="form-control" name="mobile" value="{{ $allottee->mob }}"
                                    readonly>
                            </div>
                        </div>
                    </div>
                        @if ($allottee->willingness)
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label> QUARTERS ALLOTMENT PROCEEDINGS No. </label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <input type="text" class="form-control" name="mobile"
                                        value="{{ $allottee->proceedings_no }}" readonly>
                                </div>
                            </div>
                            <div class="row p-1 border">
                                <div class="col-md-6 ml-auto">
                                    <label> QUARTERS ALLOTMENT PROCEEDINGS </label>
                                </div>
                                <div class="col-md-6 ml-auto">
                                    <a href="{{ asset('storage/' . $allottee->proceedings_doc) }}"
                                        class="btn btn-block border" target="_blank"><u>
                                            Click to download </u></a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif
            <div class="d-flex justify-content-center m-5"> <a href=" {{ route('unitHead-viewAllQuarters') }}"> <button
                        type="button" class="btn btn-primary"> Back </button> </a> </div>
        </div>
    </form>
@endsection
