@extends('layouts.unitHead-dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('unitHead-unit_registration')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>ADD UNIT HEAD DETAILS</h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">UNIT NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="mother_unit" value="{{ $unit->mother_unit}}" readonly>
                            @error('mother_unit')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="unitHead_pen" value="{{auth()->user()->pen}}" readonly>
                            @error('unitHead_pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT HEAD NAME "
                                name="unitHead_name" value="{{auth()->user()->name}}" readonly>
                            @error('unitHead_name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD OFFICIAL MOBILE NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT HEAD OFFICIAL MOBILE NUMBER "
                                name="unitHead_mob" value="{{old('unitHead_mob')}}">
                            @error('unitHead_mob')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        
                        <dt class="col-sm-4 text-info font-secondary">UNIT OFFICIAL ADDRESS </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT ADDRESS"
                                name="unit_address" value="{{auth()->user()->mother_unit.'  PIN:'  }}">
                            @error('unit_address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">OFFICE TELEPHONE NO. WITH STD CODE </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="TELEPHONE NUMBER"
                                name="tel_no" value="{{old('unit_address')}}">
                            @error('tel_no')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                   
                      
                        <dt class="col-sm-4 text-info font-secondary mt-3">UNIT OFFICIAL E- Mail </dt>
                        <dd class="col-sm-8"><input type="email" class="form-control" placeholder="OFFICIAL E-mail"
                                name="unit_email" value="{{old('unit_email')}}">
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
@endsection
