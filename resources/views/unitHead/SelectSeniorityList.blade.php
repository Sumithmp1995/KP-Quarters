@extends('layouts.unitHead-dashboard')
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
        <h5 class="d-flex justify-content-center"> SELECT TYPE OF SENIORITY LIST</h5>
        <div class="d-flex justify-content-center ">
            <form action="{{ route('unitHead-view_seniorityLists') }}" method="POST" class="mt-5">
                @csrf
                <div class="row mt-3">
                    <div class=" col-6 pr-5">
                        <label for=""> SELECT TYPE OF APPLICANT</label>
                        <select class="form-control " name="typeOfApplicant" id="" required>
                            <option value=""> SELECT TYPE OF APPLICANT </option>
                            <option value="MINISTERIAL"> MINISTERIAL </option>
                            <option value="EXECUTIVE"> POLCE PERSONNEL </option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for=""> SELECT TYPE OF LIST </label>
                        <select class="form-control " name="typeOfQuarters" id="" required>
                            <option value=""> SELECT TYPE OF LIST </option>
                            <option value="LSQ"> LOWER SUBORDINATE LIST </option>
                            <option value="USQ"> UPPER SUBORDINATE LIST </option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-center p-3 mt-3">
                    <button class="btn btn-primary"> SUBMIT </button>
                </div>
            </form>
        </div>
    </div>
@endsection
