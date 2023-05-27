@extends('layouts.unitHead-dashboard')
@section('content')

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert"> x </button>
        </div>
    @endif
</div>

    <h4 class=" d-flex justify-content-center"> Handover Office</h4>
    <section class="vh-100">
        <div class="container py-5">
            <div class="row   align-items-center ">

                <div class="card">
                    <div class="row ">
                        <div class="col m-3">
                            <div class="card-body pt-1">
                                <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                        <img src="/assets/img/profile-img.png" alt="Generic placeholder image"
                                            class="img-fluid" style="width: 120px; border-radius: 10px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="mb-1" style="color: #615e5e;">UNIT HEAD Profile</h4>
                                        <h5 class="mb-1"> {{ auth()->user()->name }}</h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;">{{ $unitHead->desig }}</p>
                                        <div class=" d-flex pt-1">
                                            <a href="{{ route('unitHead-handoverUnitHead') }}"
                                                class="btn btn-primary flex-grow-1 m-3"> Handover Charge</a>
                                            <a href="{{ route('unitHead-editProfile') }}"
                                                class="btn btn-success flex-grow-1 m-3"> Edit profile details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col m-3">
                            <div class="card-body pt-1 ">
                                <div class="d-flex text-black">
                                    <div class="flex-shrink-0">
                                        <img src="/assets/img/profile-img.png" alt="Generic placeholder image"
                                            class="img-fluid" style="width: 120px; border-radius: 10px;">
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="mb-1" style="color: #615e5e;">QUARTER MASTER Profile</h4>
                                        <h5 class="mb-1"> {{ $ri->name }} </h5>
                                        <p class="mb-2 pb-1" style="color: #2b2a2a;"> QM Charge</p>

                                        <div class="d-flex pt-1">
                                            <a href="{{ route('unitHead-editRi') }}" class="btn btn-primary flex-grow-1 m-3">
                                                Handover
                                                Charge</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
