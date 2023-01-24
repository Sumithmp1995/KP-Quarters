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
                                                            <th scope="col">Present Unit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($allottees as $key => $allottee)
                                                            <tr>
                                                                <td>{{ $allottee->id}}</td>
                                                                <td>{{ $allottee->applicant_Name }}</td>
                                                                <td>{{ $allottee->rank }}</td>
                                                                <td>{{ $allottee->present_Office }}</td>
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
