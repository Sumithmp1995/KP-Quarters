@extends('layouts.unitHead-dashboard')
@section('content')
<span class=" d-flex justify-content-center"> Pending Confirmations</span>
    <div class="bg-image h-100 pt-4 mt-2" style="background-color: #638cca;">
        <div class="mask d-flex align-items-center ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @unless (count($allottees))
                    <h4 class="p-3 ml-3 justify-content-center text-white "> No Pending confirmations found ! </h4>
                   @else
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-0">
                                <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true">
                                    <table class="table table-striped mb-0">
                                        <thead style="background-color: #afcef7;">
                                            <tr>
                                                <th scope="col">Application No. </th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Applicant Category </th>
                                                <th scope="col">Type of Applicant</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($allottees as $allottee)
                                                <tr>
                                                    <td>{{ $allottee->application_no }}</td>
                                                    <td>{{ $allottee->applicant_name }}</td>
                                                    <td>{{ $allottee->applicant_type }}</td>
                                                    <td>{{ $allottee->class }}</td>
                                                    <td> <a
                                                            href="{{ route('unitHead-previewAllottee', [$allottee->allottee_id]) }}">
                                                            <button type="button" class="btn btn-success">
                                                                View allottee </button> </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endunless
                </div>
            </div>
        </div>
    </div>
@endsection