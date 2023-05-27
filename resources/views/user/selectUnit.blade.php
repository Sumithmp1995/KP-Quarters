@extends('layouts.user-dashboard')
@section('content')

<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert"> x</button>
        </div>
    @endif
</div>

    <div class="border p-4">
       
        <div class="d-flex justify-content-center">
            <form action=" {{ route('user-viewQuarters') }}">
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="">  SELECT UNIT </label>
                        <select class="form-control " name="unit" id="">
                            <option value=""> SELECT CONCERNED UNIT </option>
                         @foreach($motherUnits as $motherUnit )
                            <option value="{{$motherUnit->mother_unit }}"> {{ $motherUnit->mother_unit }}</option>
                          @endforeach
                        </select>
                    </div>
                </div>
                    <div class="p-3">
                        <button type="button "class="btn btn-primary"> VIEW QUARTERS </button>
                    </div>
            </form>
        </div>
    </div>
    <script src="assets/js/main.js"></script>
    @endsection
    