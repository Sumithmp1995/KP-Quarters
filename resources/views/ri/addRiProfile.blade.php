@extends('layouts.ri-dashboard')
@section('content')

    <div class="row">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert"> x</button>
                </div>
            @endif
        </div>

        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('ri-storeProfile') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>ADD RI DETAILS</h3>
                        </div>
                    </div>

                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">QM INCHARGE OFFICER NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="QM INCHARGE NAME"
                                name="RiName" value="{{ $ri->name }}">
                            @error('RiName')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">RI PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI PEN" name="riPen"
                                value="{{ $ri->pen }}">
                            @error('riPen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">QM OFFICER DESIGNATION </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI DESIGNATION"
                                name="desig" value="{{ old('desig') }}" required>
                            @error('desig')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> UNIT NAME </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control" placeholder="UNIT NAME" readonly
                                name="mother_unit" value="{{ auth()->user()->mother_unit }}">
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> OFFICE ADDRESS </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="OFFICE ADDRESS "
                                name="unit_address" value="{{ old('unit_address') }}">
                            @error('unit_address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> OFFICE TELEPHONE NUMBER </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control"
                                placeholder="TELEPHONE NUMBER  WITH STD CODE" name="ri_teleNo"
                                value="{{ old('ri_teleNo') }}">
                            @error('ri_teleNo')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> MOBILE NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="CONTACT NUMBER"
                                name="ri_mob" value="{{ old('ri_mob') }}">
                            @error('ri_mob')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        
                        <dt class="col-sm-4 text-info font-secondary"> EMAIL </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="EMAIL ID"
                                name="ri_email" value="{{ old('ri_email') }}">
                            @error('ri_email')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Add QM Profile</button>
                            </div>
                        </div>
                    </dl>    
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>
@endsection
