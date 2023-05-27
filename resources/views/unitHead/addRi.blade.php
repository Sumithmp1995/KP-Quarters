@extends('layouts.unitHead-dashboard')
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
                <form action="{{ route('unitHead-storeRi') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>Generate QM Login Credentials </h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">QM INCHARGE OFFICER NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="QM INCHARGE NAME"
                                name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">QM INCHARGE OFFICER PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RI PEN" name="pen"
                                value="{{ old('pen') }}" required>
                            @error('pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">PASSWORD </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="PASSWORD"
                                name="password" value="{{ old('password') }}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter,
                                                                        and at least 8 or more characters" required>
                            @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">RE-TYPE PASSWORD </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="RE-TYPE PASSWORD"
                                name="password_confirmation" value="" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                title="Must contain at least one number and one uppercase and lowercase letter,
                                                                        and at least 8 or more characters" required>
                            @error('password')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <dt class="col-sm-4 text-info font-secondary">UNIT NAME </dt>
                        <dd class="col-sm-8"> <input type="text" class="form-control" placeholder="UNIT NAME"
                                name="mother_unit" value="{{ auth()->user()->mother_unit }}" required>
                        </dd>

                        <input type="hidden" class="form-control" placeholder="UNIT NAME" name="applied"
                            value='not applicable'>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="button" class="btn btn-primary col-4 mt-5" data-toggle="modal"
                                    data-target="#riAddModal"> Create RI</button>
                            </div>
                        </div>

                        <!-- instructions Modal -->
                        <div class="modal fade" id="riAddModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header text-bg-warning">
                                        <h5 class="modal-title" id="exampleModalLabel">Caution! </h5>

                                    </div>
                                    <div class="modal-body">
                                        <b> 1. Do not share the QM Login Credentials to anyone other than concerned QM
                                            Incharge Officer <br>
                                            2. Share Credentials securely.
                                        </b>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </form>
                <!--  main form end   -->
            </div>
        </div>
    </div>
@endsection
