@extends('layouts.ri-dashboard')
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
        <h2 class="d-flex justify-content-center"> SELECT TYPE OF SENIORITY LIST</h2>
        <div class="d-flex justify-content-center">
            <form action="{{ route('ri-viewSeniorityList') }}" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="row col-6 pr-3">
                        <label for=""> APPLICANT CATEGORY </label>
                        <select class="form-control " name="typeOfApplicant" id="" required>
                            <option value=""> SELECT APPLICANT CATEGORY</option>
                            <option value="MINISTERIAL"> MINISTERIAL </option>
                            <option value="EXECUTIVE"> EXECUTIVE </option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for=""> TYPE OF LIST </label>
                        <select class="form-control " name="typeOfQuarters" id="" required>
                            <option value=""> SELECT TYPE OF LIST </option>
                            <option value="LSQ"> LOWER SUBORDINATE LIST </option>
                            <option value="USQ"> UPPER SUBORDINATE LIST </option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3">
                    <button class="btn btn-primary"> SUBMIT </button>
                </div>
            </form>
        </div>
    </div>
@endsection
