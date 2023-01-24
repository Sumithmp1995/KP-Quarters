@extends('layouts.user-dashboard')
@section('content')
   <form class=" bg-white" action="/application" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row ">
        <div class="form-group col-xl-4 mt-3">
            <label for="inputname">APPLICANT NAME</label> 
            <input type="text" class="form-control" id="inputname" name="applicant_Name" value="{{$applicant->applicant_Name}}"
                value={{ old('applicant_Name') }}>
            @error('applicant_Name')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group col-xl-4 mt-3">
           <label for="inputpen">PEN</label> 
            <input type="text" class="form-control" id="inputpen" name="pen_No" value="{{$applicant->pen_No}}"
                value={{ old('pen_No') }}>
            @error('pen_No')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group col-xl-4 mt-3">
           <label for="inputrank">RANK </label> 
            <input type="text" class="form-control" id="inputrank" name="rank" value="{{$applicant->rank}}"
                value={{ old('rank') }}>
            @error('rank')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row ">
        <div class="form-group col-md-4 mt-3">
             <label for="inputpay">PAY</label> 
            <input type="text" class="form-control" id="inputpay" name="pay" value="{{$applicant->pay}}"
                value={{ old('pay') }}>
            @error('pay')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group col-md-4 mt-3">
           <label for="inputsp">SCALE OF PAY</label>
            <input type="text" class="form-control" id="inputsp" value="{{$applicant->scale_Of_Pay}}" name="scale_Of_Pay"
                value={{ old('scale_Of_Pay') }}>
            @error('scale_Of_Pay')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>

        <div class="form-group col-md-4 mt-3">
           <label for="inputoffice">Present Office</label>
            <input type="text" class="form-control" id="inputoffice" value="{{$applicant->present_Office}}"
                name="present_Office" value={{ old('present_Office') }}>
            @error('present_Office')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
    </div>
    <div class="row ">
        <div class="form-group col-md-6 mt-2">
            <label for="inputdob">DATE OF BIRTH</label>
            <input type="date" class="form-control" id="inputdob" value="{{$applicant->date_Of_Birth}}" name="date_Of_Birth"
                value={{ old('date_Of_Birth') }}>
            @error('date_Of_Birth')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <div class="form-group col-md-6 mt-2">
            <label for="inputsa">DATE OF SUPERANNUATION</label>
            <input type="date" class="form-control" id="inputsa" value="{{$applicant->date_Of_Superannuation}}"
                name="date_Of_Superannuation" value={{ old('date_Of_Superannuation') }}>
            @error('date_Of_Superannuation')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
    </div>
<!-- Address -->
<div class="row  mt-3">
 <label for="inputCity">Permenant Address </label> 
    <div class="row ">
      <div class="form-group col-md-6 mt-3">
         <label for="inputCity">HOUSE NAME </label>
          <input type="text" class="form-control" id="inputHousename" value="{{$applicant->house_Name}}"  name="house_Name"
              value={{ old('house_Name') }}>
              @error('house_Name')
                <p class="text-danger"> {{ $message }}</p>
              @enderror
      </div>

      <div class="form-group col-md-6 mt-3">
          <label for="inputCity">STREAT NAME</label> 
          <input type="text" class="form-control" id="inputStreat_name" value="{{$applicant->streat_Name}}" name="streat_Name"
              value={{ old('streat_Name') }}>
               @error('streat_Name')
                 <p class="text-danger"> {{ $message }}</p>
               @enderror
      </div>
      
  </div>

  <div class="row ">   
        <div class="form-group col-md-6 mt-3">
           <label for="inputZip">POST OFFICE</label> 
          <input type="text" class="form-control" id="inputPostOffice" value="{{$applicant->post_Office}}" name="post_Office"
              value={{ old('post_Office') }}>
              @error('post_Office')
              <p class="text-danger"> {{ $message }}</p>
              @enderror
      </div>

      <div class="form-group col-md-6 mt-3">
        <label for="inputZip">PINCODE</label> 
        <input type="text" class="form-control" id="inputPin" value="{{$applicant->pin_Code}}" name="pin_Code"
            value={{ old('pin_Code') }}>
            @error('pin_Code')
            <p class="text-danger"> {{ $message }}</p>
            @enderror
    </div>
  </div>
</div>
    <div class="row ">
        <div class="form-group col-md-4 mt-3">
            <label for="inputCity">VILLAGE</label>
            <input type="text" class="form-control" id="inputCity" value="{{$applicant->village}}" name="village"
                value={{ old('village') }}>
                @error('village')
                  <p class="text-danger"> {{ $message }}</p>
                @enderror
        </div>

        <div class="form-group col-md-4 mt-3">
          <label for="inputCity">TALUK</label> 
            <input type="text" class="form-control" id="inputCity" value="{{$applicant->taluk}}" name="taluk"
                value={{ old('taluk') }}>
                 @error('taluk')
                   <p class="text-danger"> {{ $message }}</p>
                 @enderror
        </div>
        <div class="form-group col-md-4 mt-3">
            <label for="inputZip">DISTRICT</label> 
            <input type="text" class="form-control" id="inputZip" value="{{$applicant->district}}" name="district"
                value={{ old('district') }}>
                @error('district')
                 <p class="text-danger"> {{ $message }}</p>
                @enderror
        </div>
    </div>

    <div class="form-group mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="check_With_Family" >
            <label class="form-check-label" for="gridCheck">
                <b> WHETHER MARRIED AND PROPOSED TO OCCUPY QUARTERS IS ALLOTTED WITH FAMILY</b>
            </label>
        </div>
    </div>
    
    <div class="form-group mt-3">
        <div class="checkbox">
            <input type="checkbox" data-bs-toggle="collapse" data-bs-target="#collapseOne" name="partner_Employee" >
            <b>WHETHER HUSBAND/WIFE IS EMPLOYED AND IF SO PARTICULARS REGARDING:</b>
        </div>
    </div>
    {{-- <div id="collapseOne" aria-expanded="false" class="collapse">
        <div class="row mt-3">
            <div class="form-group col-md-4">
                <!-- <label for="inputCity">Place Of Employment</label> -->
                <input type="text" class="form-control" id="inputSpouseOffice" placeholder="Spouse place Of Employment"
                    name="spouse_Office" value={{ old('spouse_Office') }}>
                @error('spouse_Office')
                    <p class="text-danger"> {{ $message }}</p>
                @enderror
            </div>
        </div>
    </div> --}}

    <div class="form-group mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck" name="radius_Five_Miles" >
            <label class="form-check-label" for="gridCheck">
                <b> WHETHER OWNS A HOUSE WITHIN HIS/HER HEAD QUARTERS CITY OF TOWN OR WITHIN A RADIUS OF FIVE
                    MILES/EIGHT KILOMETERS FROM HIS OR HER OFFICE</b>
            </label>
        </div>
    </div>

    <div class="row mt-3">
        <div class="form-group col-md-6 mt-3">
            <input type="file" class="form-control" id="inputMarriageCertificate" 
                name="marriage_Certificate">
            @error('marriage_Certificate')
                <p class="text-danger"> {{ $message }}</p>
            @enderror
        </div>
        <label class="text-success">Upload marriage certiticate in pdf format</label>
    </div>

 </div>
</form>
@endsection