@extends('layouts.unitHead-dashboard')
@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>

    <!-- table -->
    <div class="container-fluid">
        <table class="table align-middle mb-0  fw-bold">
            <thead class="bg-primary">
                <tr>
                    <th>Application No </th>
                    <th>Name</th>
                    <th>PEN</th>
                    <th>RANK</th>
                    <th>Applicant Category </th>
                    <th>Date of Quarters Allotted </th>
                    <th>Proceed to Vacate</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vacattees as $vacattee)
                    <tr>
                        <td>{{ $vacattee->application_no }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="ms-3">
                                    <p class="fw-bold mb-1"> {{ $vacattee->applicant_name }} </p>
                                </div>
                            </div>
                        </td>
                        <td> {{ $vacattee->pen }} </td>
                        <td>{{ $vacattee->rank }}</td>
                        <td>{{ $vacattee->applicant_type }}</td>
                        <td>{{ $vacattee->created_at }}</td>
                        <td>
                            <a href=" {{ route('unitHead-previewVacate', $vacattee->id) }} ">
                                <button type="button" class="btn btn-primary py-md-2"> View Application </button> </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
