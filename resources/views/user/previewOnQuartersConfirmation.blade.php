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

    <div class="d-flex justify-content-center">
        <h4> Quarters Details </h4>
    </div>
    <form class=" bg-white border border-info" action="" method="" enctype="multipart/form-data">
        <div class="container-fluid m-2">
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NAME</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_name }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border ">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS NUMBER</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->quarters_no }}"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS CATEGORY</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->class }}" readonly>
                </div>
            </div>
            <div class="row p-1 border">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> QUARTERS TYPE</label>
                </div>
                <div class="col-md-6 ml-auto">
                    <input type="text" class="form-control" name="priority" value="{{ $quarters->type }}" readonly>
                </div>
            </div>
            <div class="row p-1 border  d-flex justify-content-center">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> STATUS</label>
                </div>
                <div class="col-md-6 ml-auto ">
                    <input type="text" class="form-control " name="priority"
                        value="{{ $quarters->status == 0 ? 'Not Occupied' : 'Allottee : ' . $allottee->applicant_name }} "
                        readonly>
                </div>
            </div>
            <div class="row p-1 border  d-flex justify-content-center">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> ISSUED ON </label>
                </div>
                <div class="col-md-6 ml-auto ">
                    <input type="text" class="form-control " name="priority"
                        value="{{ $allottee->updated_at }} "
                        readonly>
                </div>
            </div>
            <div class="row p-1 border  d-flex justify-content-center">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> REMAINING DAYS </label>
                </div>
                <div class="col-md-6 ml-auto ">
                    <input type="text" class="form-control " name="priority"
                        value= " 0 Days"
                        readonly>
                </div>
            </div>
            <div class="row p-1 border  d-flex justify-content-center">
                <div class="col-md-6 ml-auto">
                    <label for="inputname"> ASSET REGISTER </label>
                </div>
                <div class="col-md-6 ml-auto ">
                    <button type="button" data-toggle="modal" data-target="#assetModal">
                        Assets Details
                    </button>
                </div>
            </div>
            
                @if ($priorityStatus)
                    <h4 class="text-bg-success p-2 d-flex justify-content-center ">
                        Quarters available within the priority list of the applicant. </h4>
                @else
                    <h4 class="text-bg-danger p-2 d-flex justify-content-center ">
                        Quarters allocated not within the priority list of the applicant. </h4>
                @endif
            </div>
        </div>
        @if(auth()->user()->remember_token == 2)
        <div class="d-flex justify-content-center m-3" >
            <span class="">
                <a href="{{ route('user-willingness') }}" class="btn btn-primary"> Willingness </a>
            </span>
        </div>
        @endif
    </form>

 <!-- Asset Modal -->
 <div class="modal fade" id="assetModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
 aria-hidden="true">
 <div class="modal-dialog modal-lg" role="document">
     <div class="modal-content">
         <div class="modal-header  text-bg-primary d-flex justify-content-center ">
             <h4 class="modal-title" id="exampleModalLongTitle">Assets Details</h4>
         </div>
         <div class="modal-body">
             <table class="table table-bordered">
                 <thead>
                     <tr>
                         <th scope="col">#</th>
                         <th scope="col"> ITEM NAME </th>
                         <th scope="col"> ITEM TYPE </th>
                         <th scope="col"> ITEM COUNT </th>
                         <th scope="col"> REMARK </th>
                     </tr>
                 </thead>
                 <tbody>
                     @foreach ($assets as $asset)
                         <tr>
                             <th scope="row"> {{ $asset->id }} </th>
                             <td> {{ $asset->asset_name }} </td>
                             <td> {{ $asset->asset_type }} </td>
                             <td> {{ $asset->count }} </td>
                             <td> {{ $asset->remark }} </td>
                         </tr>
                     @endforeach
                 </tbody>
             </table>
             <div class="modal-footer">
                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
             </div>
         </div>
     </div>
 </div>
</div>

    
@endsection
