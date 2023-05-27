@extends('layouts.ri-dashboard')
@section('content')
    <h4 class="  text-center pb-md-0 mb-md-3"> QUARTERS PREVIEW </h4>
    <form class=" bg-white border border-info" action="" method="">
        <div class="container-fluid">
            
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_no }}" readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NAME</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_name }}"
                        readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CATEGORY</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->class }}" readonly>
                </div>
            </div>

            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS TYPE</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->type }}  QUARTERS" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> KSEB CONSUMER NUMBER </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->kseb_no }}  " readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> KWA CONSUMER NUMBER </label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->kwa_no }}  " readonly>
                </div>
            </div>
        </div>
    </form>

    <div class="text-bg-success d-flex justify-content-center mt-5">
        <h4> Add Assets Details </h4>
    </div>

    <form class=" bg-white border border-info" action="{{ route('ri-storeAssets') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="quarters_id" value="{{ $quarters->id }}">
        <table class="table table-bordered" id="table">
            <tr>
                <th>Asset Name</th>
                <th>Asset Type</th>
                <th>Asset Count</th>
                <th>Remark</th>
                <th>Action</th>
            </tr>
            <tr>
                <td> <input type="text" name="inputs[0][asset_name]" placeholder="Enter Asset Name" class="form-control"
                        required> </td>
                <td> <input type="text" name="inputs[0][asset_type]" placeholder="Enter Asset Type" class="form-control"
                        required> </td>
                <td><input type="text" name="inputs[0][count]" placeholder="Enter Asset Count" class="form-control"
                        required> </td>
                <td><input type="text" name="inputs[0][remark]" placeholder="Enter Asset Remark" class="form-control"
                        required></td>
                <td><button type="button" name="add" id="add" class="btn btn-warning"> Add More+ </button></td>
            </tr>
        </table>
        <div class=" d-flex justify-content-center ">
            <span class="col p-2"> <a class="btn btn-success" href="{{ route('ri-findAllottee', [$quarters->id]) }} ">
                    Later </a> </span>
            <span class="col p-2 "> <button type="submit" class="btn btn-primary col-md-2 "> Save </button> </span>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var i = 0;
        $('#add').click(function() {
            ++i;
            $('#table').append(
                `<tr>
            <td> <input type="text" name="inputs[` + i + `][asset_name]" placeholder="Enter Asset Name" class="form-control">    </td>
            <td> <input type="text" name="inputs[` + i + `][asset_type]" placeholder="Enter Asset Name" class="form-control"> </td>
            <td><input type="text" name="inputs[` + i + `][count]" placeholder="Enter Asset Name" class="form-control"> </td>
            <td><input type="text" name="inputs[` + i + `][remark]" placeholder="Enter Asset Name" class="form-control"></td>
            <td><button type="button"  class="btn btn-danger remove-table-row"> Remove </button></td>
        </tr>`);
        });
        $(document).on('click', '.remove-table-row', function() {
            $(this).parents('tr').remove();
        })
    </script>
@endsection
