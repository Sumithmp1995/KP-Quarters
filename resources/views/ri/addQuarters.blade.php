@extends('layouts.ri-dashboard')
@section('content')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert"> x</button>
        </div>
    @endif
    @if (session()->has('errorMessage'))
        <div class="alert alert-danger">
            {{ session()->get('errorMessage') }}
            <button type="button" class="close" data-dismiss="alert"> x</button>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <form action="{{ route('ri-storeQuarters') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>ADD QUARTERS DETAILS OF VACANT AND NEW ONE</h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">Quarters Name*</dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Name" required
                                name="quarters_name">
                            @error('quarters_name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class=" col-sm-4 text-info font-secondary">Type*</dt>
                        <dd class="col-sm-8">
                            <div class=" pb-2">
                                <select class="form-control" name="type" required>
                                    <option value="">QUARTERS TYPE</option>
                                    <option value="SINGLE">SINGLE</option>
                                    <option value="DOUBLE">DOUBLE</option>
                                </select>
                                @error('type')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">Class</dt>
                        <dd class="col-sm-8">
                            <div class=" pb-2">
                                <select class="form-control" name="class" required>
                                    <option value=""> QUARTERS CLASS</option>
                                    <option value="LSQ">LSQ</option>
                                    <option value="USQ">USQ</option>
                                </select>
                                @error('class')
                                    <p class="text-danger"> {{ $message }}</p>
                                @enderror
                            </div>
                        </dd>
                        <dt class="col-sm-4 text-truncate text-info font-secondary">QUARTERS NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Quarters number"
                                name="quarters_no">
                        </dd>
                        <dt class="col-sm-4 text-truncate text-info font-secondary"> TC NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="TC NUMBER"
                                name="tc_no">
                        </dd>
                        <dt class="col-sm-4 text-truncate text-info font-secondary"> KWA CONSUMER NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="KWA CONSUMER NUMBER"
                                name="kwa_no">
                        </dd>
                        <dt class="col-sm-4 text-truncate text-info font-secondary">KSEB CONSUMER NUMBER</dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="KSEB CONSUMER NUMBER"
                                name="kseb_no">
                        </dd>
                    </dl>
                    <div class="row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary"> ADD QUARTERS </button>
                        </div>
                    </div>
                </form>
            </div>
            <!--               Import quarters -->
            <div class="border p-3">
                <form action="{{ route('import-Quarters') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>IMPORT QUARTERS DETAILS USING EXCEL </h3>
                        </div>
                        <div class="col-sm-6 ">
                            <input class="form-control" name="file" type="file" id="formFile">
                        </div>
                        <div class="col-sm-6 ">
                            <button type="submit" class="btn btn-primary">Import Quarters</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
