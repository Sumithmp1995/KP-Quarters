@extends("layouts.unitHead-dashboard")
@section('content')


  <div>
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Application id: {{$applicant->id}}  &nbsp Applied On: {{$applicant->created_at}} </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body fw-bold ">


        <h6 class="text-center w-100"> APPENDIX-1 [Vide rule 10(a)]</h6>
        <h3 class=" pb-2 text-center pb-md-0 mb-md-5">Application for allotment of family quarters</h3>
        <form class=" bg-white" action="/application" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row ">
              <div class="form-group col-xl-4 mt-3">
                  <label for="inputname">APPLICANT NAME</label> 
                  <input readonly type="text" class="form-control" id="inputname" name="applicant_Name" value="{{$applicant->applicant_Name}}"
                      value={{ old('applicant_Name') }} >
                  @error('applicant_Name')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
  
              <div class="form-group col-xl-4 mt-3">
                 <label for="inputpen">PEN</label> 
                  <input readonly type="text" class="form-control" id="inputpen" name="pen_No" value="{{$applicant->pen_No}}"
                      value={{ old('pen_No') }} >
                  @error('pen_No')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
  
              <div class="form-group col-xl-4 mt-3">
                 <label for="inputrank">RANK </label> 
                  <input readonly type="text" class="form-control" id="inputrank" name="rank" value="{{$applicant->rank}}"
                      value={{ old('rank') }}>
                  @error('rank')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
          </div>
  
          <div class="row ">
              <div class="form-group col-md-4 mt-3">
                   <label for="inputpay">PAY</label> 
                  <input readonly type="text" class="form-control" id="inputpay" name="pay" value="{{$applicant->pay}}"
                      value={{ old('pay') }}>
                  @error('pay')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
  
              <div class="form-group col-md-4 mt-3">
                 <label for="inputsp">SCALE OF PAY</label>
                  <input readonly type="text" class="form-control" id="inputsp" value="{{$applicant->scale_Of_Pay}}" name="scale_Of_Pay"
                      value={{ old('scale_Of_Pay') }}>
                  @error('scale_Of_Pay')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
  
              <div class="form-group col-md-4 mt-3">
                 <label for="inputoffice">Present Office</label>
                  <input readonly type="text" class="form-control" id="inputoffice" value="{{$applicant->unit}}"
                      name="present_Office" value={{ old('present_Office') }}>
                  @error('present_Office')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
          </div>
          <div class="row ">
              <div class="form-group col-md-6 mt-2">
                  <label for="inputdob">DATE OF BIRTH</label>
                  <input readonly type="date" class="form-control" id="inputdob" value="{{$applicant->date_Of_Birth}}" name="date_Of_Birth"
                      value={{ old('date_Of_Birth') }}>
                  @error('date_Of_Birth')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror
              </div>
              <div class="form-group col-md-6 mt-2">
                  <label for="inputsa">DATE OF SUPERANNUATION</label>
                  <input readonly type="date" class="form-control" id="inputsa" value="{{$applicant->date_Of_Superannuation}}"
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
                <input readonly type="text" class="form-control" id="inputHousename" value="{{$applicant->house_Name}}"  name="house_Name"
                    value={{ old('house_Name') }}>
                    @error('house_Name')
                      <p class="text-danger"> {{ $message }}</p>
                    @enderror
            </div>
  
            <div class="form-group col-md-6 mt-3">
                <label for="inputCity">STREAT NAME</label> 
                <input readonly type="text" class="form-control" id="inputStreat_name" value="{{$applicant->streat_Name}}" name="streat_Name"
                    value={{ old('streat_Name') }}>
                     @error('streat_Name')
                       <p class="text-danger"> {{ $message }}</p>
                     @enderror
            </div>
            
        </div>
  
        <div class="row ">   
              <div class="form-group col-md-6 mt-3">
                 <label for="inputZip">POST OFFICE</label> 
                <input readonly type="text" class="form-control" id="inputPostOffice" value="{{$applicant->post_Office}}" name="post_Office"
                    value={{ old('post_Office') }}>
                    @error('post_Office')
                    <p class="text-danger"> {{ $message }}</p>
                    @enderror
            </div>
  
            <div class="form-group col-md-6 mt-3">
              <label for="inputZip">PINCODE</label> 
              <input readonly type="text" class="form-control" id="inputPin" value="{{$applicant->pin_Code}}" name="pin_Code"
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
                  <input readonly type="text" class="form-control" id="inputCity" value="{{$applicant->village}}" name="village"
                      value={{ old('village') }}>
                      @error('village')
                        <p class="text-danger"> {{ $message }}</p>
                      @enderror
              </div>
  
              <div class="form-group col-md-4 mt-3">
                <label for="inputCity">TALUK</label> 
                  <input readonly type="text" class="form-control" id="inputCity" value="{{$applicant->taluk}}" name="taluk"
                      value={{ old('taluk') }}>
                       @error('taluk')
                         <p class="text-danger"> {{ $message }}</p>
                       @enderror
              </div>
              <div class="form-group col-md-4 mt-3">
                  <label for="inputZip">DISTRICT</label> 
                  <input readonly type="text" class="form-control" id="inputZip" value="{{$applicant->district}}" name="district"
                      value={{ old('district') }}>
                      @error('district')
                       <p class="text-danger"> {{ $message }}</p>
                      @enderror
              </div>
              <div class="form-group mt-5 border p-3">
                <label class="fw-bold"> MARITAL STATUS </label>

                <div class="form-check mt-3">
                    <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault1"
                        checked value='MARRIED'>
                    <label class="form-check-label" for="flexRadioDefault1">
                        MARRIED
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault2"
                        value='UNMARRIED'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        UNMARRIED
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="marital_status" id="flexRadioDefault2"
                        value='OTHER'>
                    <label class="form-check-label" for="flexRadioDefault2">
                        OTHER
                    </label>
                </div>
                <div class="form-group mt-3">
                    <div class="checkbox">
                        <input class="form-check-input" type="checkbox" checked data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" name="partner_Employee">
                        <b> NOT BEING OCCUPANT TO ANY QUARTERS</b>
                    </div>
                </div>
            </div>

          </div>
       </div>
      </form>



        <div class="modal-footer">
          <a href="{{ route('unitHead-approve_application', $applicant->id)}}" class="btn btn-success"> APPROVE </a>
          <a href="/reject_application/{{$applicant->id}}"  class="btn btn-danger">REJECT </a>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">CLOSE</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection


