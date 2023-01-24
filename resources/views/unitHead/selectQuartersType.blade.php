@extends('layouts.unitHead-dashboard')
@section('content')
    <div class="border p-4">

        <h2 class="d-flex justify-content-center"> SELECT QUARTERS TYPE</h2>

        <div class="d-flex justify-content-center">
            <form action="/view_seniorityList" method="POST">
                @csrf
                <div class="row mt-3">
                    <div class="col-10">
                        <label> QUARTERS TYPE</label>
                        <select class="form-control " name="typeOfQuarters" id="">
                      
                            <option> SELECT TYPE OF QUARTERS </option>
                            <option value="LSQ"> LOWER SUBORDINATE QUARTERS </option>
                            <option value="USQ"> UPPER SUBORDINATE QUARTERS </option>
                        </select>
                    </div>
                    <div  class="col-10 pt-3">
                        <label> QUARTERS TYPE</label>
                        <select class="form-control " name="typeOfQuarters" id="">
                            <option> SELECT QUARTERS TYPE</option>
                        </select>
                    </div>
                    <div class="pt-3">
                        <button class="btn btn-primary"> SEARCH </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @endsection
