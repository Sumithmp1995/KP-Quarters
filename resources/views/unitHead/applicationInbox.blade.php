@extends('layouts.unitHead-dashboard')
@section('content')
    <!-- table -->
    <div class="container-fluid">
        <table class="table align-middle mb-0  fw-bold">
            <thead class="bg-primary">
                <tr>
                    <th>Application No </th>
                    <th>Name</th>
                    <th>PEN</th>
                    <th>RANK</th>
                    <th>Present Unit</th>
                    <th>Mother Unit</th>
                    <th>Date of Application Received</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($applicants as $applicant)
                    <tr>
                        <td>{{ $applicant->application_no }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"> {{ $applicant->applicant_name }} </p>
                                </div>
                            </div>
                        </td>
                        <td> {{ $applicant->pen }}  </td>
                        <td>{{ $applicant->rank }}</td>
                        <td>{{ $applicant->present_unit }}</td>
                        <td>{{ $applicant->mother_unit }}</td>
                        <td>{{ $applicant->created_at }}</td>
                        <td>
                            <a href="{{ route('unitHead-viewApplication', $applicant->id) }}"> <button type="button"
                                    class="btn btn-primary py-md-2 "> View </button> </a>

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
