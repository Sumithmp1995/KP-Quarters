@extends('layouts.unitHead-dashboard')
@section('content')

    <div>
        @if (session()->has('errorMessage'))
            <div class="alert alert-danger">
                {{ session()->get('errorMessage') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('unitHead-updateUnitHead') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>CHANGE UNIT HEAD CREDENTIALS </h3>
                        </div>
                    </div>

                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary"> NEW UNIT HEAD NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder=" NEW UNIT NAME"
                                name="name" value="{{ $unit->name }}" required>
                            @error('mother_unit')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">NEW UNIT HEAD PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder=" NEW UNIT HEAD PEN"
                                name="pen" pattern="\d{6,6}" title="PEN Should be 6 Digits length" required>
                            @error('unitHead_pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary"> OLD PASSWORD </dt>
                        <dd class="col-sm-8"><input type="password" class="form-control" placeholder=" OLD PASSWORD"
                                name="oldPassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter,
                                                                        and at least 8 or more characters"
                                required>
                            @error('oldPassword')
                                <p class="text-danger"> {{ $errorMessage }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">NEW PASSWORD </dt>
                        <dd class="col-sm-8"><input type="password" class="form-control" placeholder=" NEW PASSWORD"
                                name="password" value="{{ old('password') }}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter,
                                                                        and at least 8 or more characters">
                            @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">RE-TYPE PASSWORD </dt>
                        <dd class="col-sm-8"><input type="password" class="form-control" placeholder="RE-TYPE NEW PASSWORD"
                                name="password_confirmation" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter,
                                                                        and at least 8 or more characters" >
                            @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Save changes </button>
                            </div>
                        </div>
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>
@endsection
