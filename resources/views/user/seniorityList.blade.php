@extends('layouts.user-dashboard')

@section('content')
    <div class="container bg-white" style="min-height :500px;">
        <div class="col-md-12 text-center">
            <!-- table -->
            <section class="intro">
                <div class="bg-image h-100" style="background-color: #f9fafd;">
                    <div class="mask d-flex align-items-center h-100">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body p-0">
                                            <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                                style="position: relative; ">
                                                <table class="table table-striped mb-0">
                                                    <thead style="background-color: #2c81f0;">
                                                        <tr>
                                                            <th scope="col">Sl.no</th>
                                                            <th scope="col">Name</th>
                                                            <th scope="col">Designation</th>
                                                            <th scope="col">Mother Unit</th>
                                                            <th scope="col">Present Unit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($applicants as $applicant)
                                                            <tr>
                                                                <td>{{ $applicant->id }}</td>
                                                                <td>{{ $applicant->applicant_name }}</td>
                                                                <td>{{ $applicant->rank }}</td>
                                                                <td>{{ $applicant->mother_unit }}</td>
                                                                <td>{{ $applicant->present_unit }}</td>
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
            <!-- table end -->
        </div>
    </div>

    </div>
    </div>
@endsection
