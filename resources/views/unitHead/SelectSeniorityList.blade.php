@extends('layouts.unitHead-dashboard')
@section('content')
    <div class="border p-4">
        <h2 class="d-flex justify-content-center"> SELECT TYPE OF SENIORITY LIST</h2>

        <div class="d-flex justify-content-center">
            <form action="/view_seniorityList" >
                <div class="row mt-3">
                    <div class="col-6">
                        <label for="">  SELECT TYPE OF LIST </label>
                        <select class="form-control " name="typeOfQuarters" id="">
                            <option> SELECT TYPE OF LIST </option>
                            <option value="LSQ"> LOWER SUBORDINATE LIST </option>
                            <option value="USQ"> UPPER SUBORDINATE LIST </option>
                        </select>
                    </div>

                    <div class="row col-6 pr-3">
                        <label for="">  SELECT TYPE OF APPLICANT</label>
                        <select class="form-control " name="typeOfApplicant" id="">
                            <option> SELECT TYPE OF APPLICANT </option>
                            <option value="MINISTERIAL"> MINISTERIAL </option>
                            <option value="EXECUTIVE"> EXECUTIVE </option>
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
    