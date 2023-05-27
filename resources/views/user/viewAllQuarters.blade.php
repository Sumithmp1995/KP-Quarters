
@extends('layouts.user-dashboard')
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
                <button type="button" class="close" data-dismiss="alert"> x </button>
            </div>
        @endif
    </div>

    <div class="row display">
        <div class="col-12 table-responsive">
            <table class="display datatable" id="newtab" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>QUARTERS NAME</th>
                        <th>NUMBER</th>
                        <th>TYPE</th>
                        <th>CLASS</th>
                        <th>STATUS</th>
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
                ajax: {
                    url: "{{ route('user-viewAllQuarters') }}",
                    type: 'POST',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "category": "ajax",
                        "unit": "{{ $unit }}",
                    }
                },
                columns: [{
                        data: 'id',
                        name: 'id',
                        visible: false,
                    },
                    {
                        data: 'quarters_name',
                        name: 'quarters_name'
                    },
                    {
                        data: 'quarters_no',
                        name: 'quarters_no'
                    },
                    {
                        data: 'type',
                        name: 'type'
                    },
                    {
                        data: 'class',
                        name: 'class'
                    },
                    {
                        data: 'status',
                        render: function(data, type, row) {

                            if (data == 1) {
                                return 'Occupied';
                            } else if (data == 0) {
                                return 'Confirmation send';
                            } else if (data == null) {
                                return 'Not Occupied ';
                            }
                        }
                    },
                ]

            });
        });
    </script>
@endsection