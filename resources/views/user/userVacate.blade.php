@extends('layouts.user-dashboard')
@section('content')
    <div style="min-height: 500px; font-size:large; font: display 6px;">
        <form class="  bg-white border p-4" action={{ route('user.storeVacateData') }} method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="form-group mt-5 p-3">
                <label class="fw-bold d-flex justify-content-center border text-bg-light"> VACATE </label>
                <label class="fw-bold d-flex "> Specify Below </label>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault1" checked
                        value='TRANSFERRED'>
                    <label class="form-check-label" for="flexRadioDefault1">
                        TRANSFERRED
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault2" value='RETIRED'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        RETIRED
                    </label>
                </div>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="reason" id="flexRadioDefault2" value='OTHER'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        OTHER
                    </label>
                </div>

                <div class="form-outline text-danger mt-3">
                    <input type="text" id="typeText" class="form-control" style="min-height :100px ;"
                        placeholder="Type here" name='other_reason'>
                    <label class="form-label p-2" for="typeText">If other please mention your reason</label>
                </div>
            </div>
            <div class="border text-bg-light p-3 ">
                <h3 class="border text-bg-warning  align-content-center"> UPLOAD NO DUES </h3>

                <div class="form-group col-md-6 p-3 mt-4">
                    <label class="font-weight-bold mt-4"> UPLOAD KSEB Nodues certificate</label>
                    <input type="file" class="form-control" id="kseb_noDues" name="kseb_noDues" required>
                    @error('kseb_noDues')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                    <label class="text-success"> Image should be .jpg / .jpeg format</label>
                </div>

                <div class="form-group col-md-6 p-3 mt-4">
                    <label class="font-weight-bold mt-4"> UPLOAD KWA Nodues certificate</label>
                    <input type="file" class="form-control" id="kwa_noDues" name="kwa_noDues" required>
                    @error('kwa_noDues')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                    <label class="text-success"> Image should be .jpg / .jpeg format</label>
                </div>

                <div class="border p-3">
                    <label for=""> Declaration</label>
                    <div>
                        <input type="checkbox" name="occupant_declaration" value=1 required>
                        The Quarters maintained in accomodation condition.
                        All assets provided when quarters allocated is being kept in good condition
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mt-3 ">Submit</button>
                </div>
            </div>
    </div>
@endsection
