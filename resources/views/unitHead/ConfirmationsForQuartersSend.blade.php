@extends('layouts.unitHead-dashboard')
@section('content')
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #638cca;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                        style="position: relative; height: 300px">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #afcef7;">
                                                <tr>
                                      
                                                    <th scope="col">Application No. </th>
                                                    <th scope="col">Allottee Name</th>
                                                    <th scope="col">Type of Applicant</th>
                                                    <th scope="col">Name of Quarters</th>
                                                    <th scope="col">Quarters Number</th>
                                                    <th scope="col">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($applicants as $applicant)
                                                    <tr> 
                                                        <td>{{ $applicant->application_no }}</td>
                                                        <td>{{ $applicant->applicant_name }}</td>
                                                        <td>{{ $applicant->applicant_type }}</td>
                                                        <td>{{ $applicant->type }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
