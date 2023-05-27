@extends('layouts.unitHead-dashboard')
@section('headers')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
@endsection

@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>



    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-bordered datatable" id="newtab">
                <thead>
                    <tr>
                        <th>Seniority No. </th>
                        <th>Application No. </th>
                        <th>Name</th>
                        <th>Type of Applicant</th>
                        <th>Type of Quarters</th>
                        <th>Date of Application Submitted</th>
                        <th>Action</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">
        $(function() {
            var table = $('#newtab').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('unitHead-view_seniorityLists') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "category": "ajax",
                        "applicant_type": "{{ $typeOfApplicant }}",
                        "class":"{{$class}}"
                    }
                },

                // ajax: "{{ route('unitHead-view_seniorityLists') }}",
                columns: [{
                        data: 'seniority_no',
                        name: 'seniority_no'
                    },
                    {
                        data: 'application_no',
                        name: 'application_no'
                    },
                    {
                        data: 'applicant_name',
                        name: 'applicant_name'
                    },
                    {
                        data: 'applicant_type',
                        name: 'applicant_type'
                    },
                    {
                        data: 'class',
                        name: 'class'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]

            });
        });
    </script>
@endsection