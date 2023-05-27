
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
                        <th>ID</th>
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
                order: [[0, 'asc']],
                ajax: "{{ route('unitHead-applicationRequests') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        visible: false
                    },{
                        data: 'application_no',
                        name: 'application_no'
                    },
                    {
                        data: 'applicant_name',
                        name: 'applicant_name'
                    },
                    {
                        data: 'pen',
                        name: 'pen'
                    },
                    {
                        data: 'rank',
                        name: 'rank'
                    },
                    {
                        data: 'present_unit',
                        name: 'present_unit'
                    },
                    {
                        data: 'mother_unit',
                        name: 'mother_unit'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'

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