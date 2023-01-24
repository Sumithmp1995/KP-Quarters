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
                                                            <th scope="col">QUARTERS NAME</th>
                                                            <th scope="col">QUARTERS No.</th>
                                                            <th scope="col">UNIT NAME</th>
                                                            <th scope="col">APPLICATION No.</th>
                                                            <th scope="col">APPROVED ON </th>
                                                            <th scope="col">CONFIRM </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                  
                                                            <tr>
                                                                <td>{{ $data->quarters_name }}</td>
                                                                <td>{{ $data->quarters_no }}</td>
                                                                <td>{{ $data->unit_name }}</td>
                                                                <td>{{ $data->application_no }}</td>
                                                                <td>{{ $data->created_at }}</td>
                                                                <td>
                                                                    <a href="/confirm_willing/{{$data->id}} "> <button type="button"
                                                                            class="btn btn-success py-md-2 "> CONFIRM </button> </a>
                                        
                                                                </td>
                                                            </tr>
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
