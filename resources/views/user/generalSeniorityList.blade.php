@extends('layouts.user-dashboard')
@section('content')
    <span class=" d-flex justify-content-center"> Seniority list  </span>
    <div class="bg-image h-100 pt-4 mt-5" style="background-color: #638cca;">
        <div class="mask d-flex align-items-center ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    @unless (count($applicants))
                        <h4 class="p-3 ml-3 justify-content-center text-white "> Seniority list empty ! </h4>
                    @else
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #afcef7;">
                                                <tr>
                                                    <th scope="col">Seniority No. </th>
                                                    <th scope="col">Application No. </th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Type of Applicant</th>
                                                    <th scope="col">Type of Quarters</th>
                                                    <th scope="col">Date of Application Submitted</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applicants as $applicant)
                                                    <tr>
                                                        <td>{{ $applicant->seniority_no }}</td>
                                                        <td>{{ $applicant->application_no }}</td>
                                                        <td>{{ $applicant->applicant_name }}</td>
                                                        <td>{{ $applicant->applicant_type }}</td>
                                                        <td>{{ $applicant->class }}</td>
                                                        <td>{{ $applicant->updated_at }} Hrs</td>
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
