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
                <form action="{{ route('ri-updateProfile') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3> CHANGE RI DETAILS</h3>
                        </div>
                    </div>

                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">QM INCHARGE OFFICER NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="QM INCHARGE NAME"
                                readonly name="RiName" value="{{ $ri->RiName }}">
                            @error('RiName')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">RI PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI PEN" readonly
                                name="riPen" value="{{ $ri->riPen }}">
                            @error('riPen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> UNIT NAME </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control" placeholder="UNIT NAME" readonly
                                name="mother_unit" value="{{ $ri->mother_unit }}">
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">QM OFFICER DESIGNATION </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI DESIGNATION"
                                name="desig" value="  {{ $ri->desig }} " required>
                            @error('desig')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> OFFICE ADDRESS </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="OFFICE ADDRESS "
                                name="unit_address" value="{{ $ri->unit_address }}">
                            @error('unit_address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> OFFICE TELEPHONE NUMBER </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control"
                                placeholder="TELEPHONE NUMBER  WITH STD CODE" name="ri_teleNo"
                                value="{{ $ri->ri_teleNo }}">
                            @error('ri_teleNo')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> MOBILE NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="CONTACT NUMBER"
                                name="ri_mob" value="{{ $ri->ri_mob }}">
                            @error('ri_mob')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> EMAIL </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="EMAIL ID"
                                name="ri_email" value="{{ $ri->ri_email }}">
                            @error('ri_email')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Save changes</button>
                            </div>
                            <div class="d-flex justify-content-center">
                                <a href="{{ route('ri-home') }}" class="btn btn-success col-4 mt-5"> Cancel</a>
                            </div>
                        </div>

                    </dl>
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>
@endsection
