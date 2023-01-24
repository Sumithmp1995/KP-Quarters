@extends('layouts.unitHead-dashboard')
@section('content')
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('unitHead-storeRi')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>ADD RI DETAILS</h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">RI NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI NAME"
                                name="name" value="{{ old('name')}}">
                            @error('name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">RI PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI PEN"
                                name="pen" value="{{old('pen')}}" >
                            @error('pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">PASSWORD </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="PASSWORD"
                                name="password" value="{{ old('password')}}">
                            @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                       
                        <dt class="col-sm-4 text-info font-secondary">UNIT NAME </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control" placeholder="UNIT NAME"
                                name="mother_unit" value="{{ auth()->user()->mother_unit}}">
                        </dd>
                       
                       <input type="hidden" class="form-control" placeholder="UNIT NAME"
                                name="applied" value= 'not applicable'>

                        <dt class="col-sm-4 text-info font-secondary">UNIT HEAD ID </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT HEAD ID "
                                name="unitHead_id" value="{{ auth()->user()->unitHead_id }}">
                        </dd>
                       <input type="hidden" class="form-control" placeholder="AC/RI QM NAME "
                                name="role" value="3">
                           
{{--                   
                        <dt class="col-sm-4 text-info font-secondary">AC/RI CONTACT NUMBER </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="AC/RI CONTACT NUMBER "
                                name="ri_mob" value="{{old('ri_mob')}}">
                            @error('ri_mob')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">AC/RI OFFICIAL ADDRESS </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="AC/RI OFFICIAL ADDRESS"
                                name="ri_address" value="">
                            @error('ri_address')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd> --}}
                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Create RI</button>
                            </div>
                        </div>
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>
@endsection
