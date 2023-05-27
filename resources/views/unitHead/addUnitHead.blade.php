@extends('layouts.unitHead-dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('unitHead-unitRegistration') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>ADD UNIT HEAD DETAILS</h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">UNIT NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="mother_unit" value="{{ $unit->mother_unit }}" readonly>
                            @error('mother_unit')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                       
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="unitHead_pen" value="{{ auth()->user()->pen }}" readonly>
                            @error('unitHead_pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT HEAD NAME "
                                name="unitHead_name" value="{{ auth()->user()->name }}" readonly>
                            @error('unitHead_name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">DESIGNATION </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder=" DESIGNATION"
                                name="desig"  value="{{ old('desig') }}">
                            @error('desig')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD OFFICIAL MOBILE NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control"
                                placeholder="UNIT HEAD OFFICIAL MOBILE NUMBER " name="unitHead_mob"
                                value="{{ old('unitHead_mob') }}" required>
                            @error('unitHead_mob')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">PINCODE </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Pincode "
                                name="unit_address" value="{{ old('unit_address') }}" required>
                            @error('unit_address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">OFFICE TELEPHONE NO. WITH STD CODE </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="TELEPHONE NUMBER"
                                name="tel_no" value="{{ old('tel_no') }}" required>
                            @error('tel_no')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>


                        <dt class="col-sm-4 text-info font-secondary mt-3">UNIT OFFICIAL E- Mail </dt>
                        <dd class="col-sm-8"><input type="email" class="form-control" placeholder="OFFICIAL E-mail"
                                name="unit_email" value="{{ old('unit_email') }}" required>
                            @error('unit_email')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Register</button>
                            </div>
                        </div>
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>



    <script type="text/javascript">
        window.onload = function() {
            OpenBootstrapPopup();
        };
        function OpenBootstrapPopup() {
            $("#InitialSetupPageOnload").modal('show');
        }
    </script>

    <!-- Modal -->
    <div class="modal fade" id="InitialSetupPageOnload" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> Initial Set-Up </h5>
                </div>
                <div class="modal-body">
                    <h4> Things to Consider When Registering Profiles</h4>
                    <b> 1. Do not skip the stages / Refresh the page until successfully complete profile registration. <br>
                        2. Add Profile details carefully. <br>
                        3. All Fields are mandatory. <br>
                        4. There is 2 Stages for Initializing KP Quarters Application for your Unit, they are as follows
                        <br> </b>
                    &nbsp I. Add Unit Head Profile
                    &nbsp II. Quarter Marshal Registration <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
                </div>
            </div>
        </div>
    </div>
@endsection
