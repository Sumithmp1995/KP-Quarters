@extends('layouts.ri-dashboard')
@section('content')
    <div class="container border p-3">
        <section class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title d-flex justify-content-center pb-3">Edit Assets </h3>
            </div>

            <div class="panel-body ">
                <form action="{{ route('ri-updateAssets', [$assetRegister->id]) }}" class="form-horizontal" method="POST" role="form">
                    @method("PUT")
                    @csrf
                
                    <input type="hidden" class="form-control " name="quarters_id" value="{{ $assetRegister->quarters_id }}">

                    <div class="form-group mb-3">
                        <label for="name" class="col-sm-3 control-label">Asset Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="asset_name" id="name"
                                placeholder="Name of assets" value="{{ $assetRegister->asset_name }}">
                        </div>
                    </div> <!-- form-group // -->

                    <div class="form-group mb-3">
                        <label for="name" class="col-sm-3 control-label">Asset Type</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control " name="asset_type" id="name"
                                placeholder=" Type of assets" value="{{ $assetRegister->asset_type }}">
                        </div>
                    </div> <!-- form-group // -->

                    <div class="form-group mb-3">
                        <label for="qty" class="col-sm-3 control-label"> Asset Count </label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="count" id="qty"
                                placeholder=" Count of assets " value="{{ $assetRegister->count }}">
                        </div>
                    </div> <!-- form-group // -->

                    <div class="form-group mb-3">
                        <label for="about" class="col-sm-3 control-label" > Remarks </label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="remark">   {{ $assetRegister->remark }} </textarea>
                        </div>
                    </div> <!-- form-group // -->

                    <hr>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-9 ">
                            <button type="submit" class="btn btn-primary"> UPDATE </button>
                        </div>
                    </div> <!-- form-group // -->
                </form>
            </div><!-- panel-body // -->
        </section><!-- panel// -->
    </div> <!-- container// -->
@endsection
