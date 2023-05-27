@extends('layouts.user-dashboard')
@section('content')
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #638cca;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        @unless (count($applicants))
                            <h4 class="p-3 ml-3 justify-content-center text-white "> Seniority list empty ! </h4>
                        @else
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-0">
                                        <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                            style="position: relative; height: 300px">
                                            <table class="table table-striped mb-0">
                                                <thead style="background-color: #afcef7;">
                                                    <tr>
                                                        <th scope="col" class="text-bg-success">Seniority No. </th>
                                                        <th scope="col">Application No. </th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">Type of Applicant</th>
                                                        <th scope="col">Type of Quarters</th>
                                                        <th scope="col">Date of Application Submitted</th>
                                                        <th scope="col"> Remarks</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($applicants as $applicant)
                                                        @if ($applicant->user_id == auth()->user()->id)
                                                            <tr class="text-bg-warning">
                                                                <td>{{ $applicant->seniority_no }}</td>
                                                                <td>{{ $applicant->application_no }}</td>
                                                                <td>{{ $applicant->applicant_name }}</td>
                                                                <td>{{ $applicant->applicant_type }}</td>
                                                                <td>{{ $applicant->class }}</td>
                                                                <td>{{ $applicant->updated_at }} Hrs</td>
                                                                <td>
                                                                    @if ($applicant->status == 'rejectee')
                                                                        Waiting for Priority Quarters
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @else
                                                            <tr>
                                                                <td>{{ $applicant->seniority_no }}</td>
                                                                <td>{{ $applicant->application_no }}</td>
                                                                <td>{{ $applicant->applicant_name }}</td>
                                                                <td>{{ $applicant->applicant_type }}</td>
                                                                <td>{{ $applicant->class }}</td>
                                                                <td>{{ $applicant->updated_at }} Hrs</td>
                                                                <td> {{ $applicant->status ? ' ' : ' Priority Selected' }}
                                                                </td>
                                                            </tr>
                                                        @endif
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
    </section>
@endsection
