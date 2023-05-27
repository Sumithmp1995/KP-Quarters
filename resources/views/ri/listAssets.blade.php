@extends('layouts.ri-dashboard')
@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert"> x</button>
        </div>
    @endif

    <div class="container-fluid bg-white row justify-content-center">
        <div class=" font-weight-bold mb-3">
            <div class="d-flex justify-content-center ">
                <h4> Asset Manager </h4>
            </div>
            <div class="d-flex justify-content-left">
                <button type="button" class="btn btn-success " onclick="showForm()"> Add More+
                </button>
            </div>
        </div>
        <div class="col-12">
            <div class="card">
                @if (count($assets))
                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                        style="position: relative; ">
                        <table class="table table-striped mb-0">
                            <thead style="background-color: #2c81f0;">
                                <tr>
                                    <th scope="col"> Asset Name </th>
                                    <th scope="col"> Asset type </th>
                                    <th scope="col">Count</th>
                                    <th scope="col">Remark</th>
                                    <th scope="col">Action</th>
                                    <th scope="col"> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($assets as $assetRegister)
                                    <tr>
                                        <td>{{ $assetRegister->asset_name }}</td>
                                        <td>{{ $assetRegister->asset_type }}</td>
                                        <td>{{ $assetRegister->count }}</td>
                                        <td>{{ $assetRegister->remark }}</td>
                                        <td> <a href="{{ route('ri-editAssets', [$assetRegister->id]) }}">
                                                <button type="button" class="btn btn-primary"> Edit </button> </a>
                                        </td>
                                        <td> <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteAssetModal">
                                                Delete </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
        @endif

        <div id="addform" style="visibility: hidden">
            <div class="text-bg-success d-flex justify-content-center">
                <h4> Add Assets Details </h4>
            </div>

            <form class=" bg-white border border-info" action="{{ route('ri-storeNewAssets') }}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="quarters_id" value="{{ $quartersId }}">
                <table class="table table-bordered" id="table">
                    <tr>
                        <th>Asset Name</th>
                        <th>Asset Type</th>
                        <th>Asset Count</th>
                        <th>Remark</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <td> <input type="text" name="inputs[0][asset_name]" placeholder="Enter Asset Name"
                                class="form-control" required>
                        </td>
                        <td> <input type="text" name="inputs[0][asset_type]" placeholder="Enter Asset Type"
                                class="form-control" required>
                        </td>
                        <td><input type="text" name="inputs[0][count]" placeholder="Enter Asset Count"
                                class="form-control" required>
                        </td>
                        <td><input type="text" name="inputs[0][remark]" placeholder="Enter Asset Remark"
                                class="form-control" required>
                        </td>
                        <td><button type="button" name="add" id="add" class="btn btn-warning"> Add More+
                            </button></td>
                    </tr>
                </table>
                <div>
                    <div class="d-flex justify-content-center m-3">
                        <button type="submit" class="btn btn-primary col-md-2 "> Save </button>
                    </div>
                    <div class="d-flex justify-content-left m-3">
                        <a href=" {{  route('ri-previewQuarter', $quartersId) }}" class="btn btn-success col-md-2 "> Back </a>
                    </div>
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

                function showForm() {
                    let div = document.getElementById('addform')
                    div.style.visibility = "visible";
                    div.style.display = "block";
                }
            </script>
        </div>
    </div>
    </section>

    <!-- delete asset Modal -->
    <div class="modal fade" id="deleteAssetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-danger">
                    <h5 class="modal-title" id="exampleModalLongTitle"> Are Sure ?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    If you click Confirm button, The action cannot be undone.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                    @if (count($assets))
                        <a href="{{ route('ri-deleteAssets', $assetRegister->id) }}">
                    @endif
                    <button type="button" class="btn btn-primary">Confirm </button> </a>
                </div>
            </div>
        </div>
    </div>
@endsection
