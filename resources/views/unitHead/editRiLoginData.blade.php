@extends('layouts.unitHead-dashboard')
@section('content')

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
                <!--  main form start -->
                <form action="{{ route('unitHead-updateRi') }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                            <h3>CHANGE QUARTER MARSHAL/ Ri </h3>
                        </div>
                    </div>
                    <dl class="row">
                        <dt class="col-sm-4 text-info font-secondary">QM Incharge NAME </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="name" value="{{ $ri->name }}">
                            @error('mother_unit')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>
                        <dt class="col-sm-4 text-info font-secondary">QM Incharge PEN </dt>
                        <dd class="col-sm-8"><input type="text" class="form-control" placeholder="UNIT NAME"
                                name="pen" value="{{ $ri->pen }}" pattern="\d{6,6}"
                                title="PEN Should be 6 Digits length">
                            @error('unitHead_pen')
                                <p class="text-danger"> {{ $message }}</p>
                            @enderror
                        </dd>

                        <div class="row">
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary col-4 mt-5"> Update</button>
                            </div>
                        </div>
                </form>
                <!--               main form end -->
            </div>
        </div>
    </div>
@endsection
