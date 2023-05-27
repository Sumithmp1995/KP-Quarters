@extends("layout.dashboarduh")
<br>
<br>
@section("content")
<body>

<main id="main" class="main">
    <!-- table -->
    <div class="container-fluid" >
    <table class="table align-middle mb-0  fw-bold">
        <thead class="bg-primary">
          <tr>
            <th>Name</th>
            <th>PEN</th>
            <th>Application id</th>
            <th>unit</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                
                <div class="ms-3">
                  <p class="fw-bold mb-1">NITHIN VIJAY</p>
                   </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">900252
              
            </td>
            <td>
                <p class="fw-normal mb-1">900252100922
              
            </td>
            <td>SCRB</td>
            <td>
              <!-- <button type="button" class="btn btn-primary py-md-2 " data-toggle="modal" data-target="#staticBackdrop">
                VIEW
              </button> -->
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        View
    </button>
              <!-- <button type="button" class="btn btn-link btn-sm btn-rounded">
                VIEW
              </button> -->
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                
                <div class="ms-3">
                  <p class="fw-bold mb-1">SUMESH</p>
                   </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">900857
              
            </td>
            <td>
                <p class="fw-normal mb-1">900857150922
              
            </td>
            <td>DHQ</td>
            <td>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">view</button>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                
                <div class="ms-3">
                  <p class="fw-bold mb-1">HARI KRISHNAN</p>
                   </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">900525
              
            </td>
            <td>
                <p class="fw-normal mb-1">900525101022
              
            </td>
            <td>MUSEUM PS</td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">
                VIEW
              </button>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                
                <div class="ms-3">
                  <p class="fw-bold mb-1">VISHNU D</p>
                   </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">902565
              
            </td>
            <td>
                <p class="fw-normal mb-1">902565091122
              
            </td>
            <td>SCRB</td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">
                VIEW
              </button>
            </td>
          </tr>
          <tr>
            <td>
              <div class="d-flex align-items-center">
                
                <div class="ms-3">
                  <p class="fw-bold mb-1">SURESH S</p>
                   </div>
              </div>
            </td>
            <td>
              <p class="fw-normal mb-1">900757
              
            </td>
            <td>
                <p class="fw-normal mb-1">900757101122
              
            </td>
            <td>TELE</td>
            <td>
              <button type="button" class="btn btn-link btn-sm btn-rounded">
                VIEW
              </button>
            </td>
          </tr>
          

        </tbody>
      </table>
      

    </div>


  
</body>




<!--    view  popup  -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<!-- <div class="modal fade " id="staticBackdrop" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl"> -->
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModal">Application id = </h5>
        
      </div>
      <div class="modal-body fw-bold ">
       
      
         <h6 class="text-center w-100"> APPENDIX-1 [Vide rule 10(a)]</h6>
        <h3 class=" pb-2 text-center pb-md-0 mb-md-5">Application for allotment of family quarters</h3>
    
        <form class=" bg-white" action="" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row ">
                <div class="form-group col-xl-4 mt-3">
                    <!-- <label for="inputname">APPLICANT NAME</label> -->
                    <input type="text" class="form-control" id="inputname" name="applicant_Name" placeholder="APPLICANT NAME"
                        value={{ old('applicant_Name') }}>
                    @error('applicant_Name')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-group col-xl-4 mt-3">
                    <!-- <label for="inputpen">PEN</label> -->
                    <input type="text" class="form-control" id="inputpen" name="pen_No" placeholder="PEN No"
                        value={{ old('pen_No') }}>
                    @error('pen_No')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-group col-xl-4 mt-3">
                    <!-- <label for="inputrank">RANK </label> -->
                    <input type="text" class="form-control" id="inputrank" name="rank" placeholder="Rank"
                        value={{ old('rank') }}>
                    @error('rank')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
    
            <div class="row ">
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputpay">PAY</label> -->
                    <input type="text" class="form-control" id="inputpay" name="pay" placeholder="Pay"
                        value={{ old('pay') }}>
                    @error('pay')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputsp">SCALE OF PAY</label> -->
                    <input type="text" class="form-control" id="inputsp" placeholder="Scale of pay" name="scale_Of_Pay"
                        value={{ old('scale_Of_Pay') }}>
                    @error('scale_Of_Pay')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
    
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputoffice">Office in which employed</label> -->
                    <input type="text" class="form-control" id="inputoffice" placeholder="Present Office"
                        name="present_Office" value={{ old('present_Office') }}>
                    @error('present_Office')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-md-6 mt-2">
                    <label for="inputdob">DATE OF BIRTH</label>
                    <input type="date" class="form-control" id="inputdob" placeholder="DATE OF BIRTH" name="date_Of_Birth"
                        value={{ old('date_Of_Birth') }}>
                    @error('date_Of_Birth')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group col-md-6 mt-2">
                    <label for="inputsa">DATE OF SUPERANNUATION</label>
                    <input type="date" class="form-control" id="inputsa" placeholder="superannuation"
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
                  <!-- <label for="inputCity">VILLAGE</label> -->
                  <input type="text" class="form-control" id="inputHousename" placeholder="house_Name"  name="house_Name"
                      value={{ old('house_Name') }}>
                      @error('house_Name')
                        <p class="text-danger"> {{ $message }}</p>
                      @enderror
              </div>
    
              <div class="form-group col-md-6 mt-3">
                  <!-- <label for="inputCity">TALUK</label> -->
                  <input type="text" class="form-control" id="inputStreat_name" placeholder="streat_Name" name="streat_Name"
                      value={{ old('streat_Name') }}>
                       @error('streat_Name')
                         <p class="text-danger"> {{ $message }}</p>
                       @enderror
              </div>
              
          </div>
    
          <div class="row ">   
                <div class="form-group col-md-6 mt-3">
                  <!-- <label for="inputZip">DISTRICT</label> -->
                  <input type="text" class="form-control" id="inputPostOffice" placeholder="post_Office" name="post_Office"
                      value={{ old('post_Office') }}>
                      @error('post_Office')
                      <p class="text-danger"> {{ $message }}</p>
                      @enderror
              </div>
    
              <div class="form-group col-md-6 mt-3">
                <!-- <label for="inputZip">DISTRICT</label> -->
                <input type="text" class="form-control" id="inputPin" placeholder="pin_Code" name="pin_Code"
                    value={{ old('pin_Code') }}>
                    @error('pin_Code')
                    <p class="text-danger"> {{ $message }}</p>
                    @enderror
            </div>
          </div>
        </div>
            <div class="row ">
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputCity">VILLAGE</label> -->
                    <input type="text" class="form-control" id="inputCity" placeholder="VILLAGE" name="village"
                        value={{ old('village') }}>
                        @error('village')
                          <p class="text-danger"> {{ $message }}</p>
                        @enderror
                </div>
    
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputCity">TALUK</label> -->
                    <input type="text" class="form-control" id="inputCity" placeholder="TALUK" name="taluk"
                        value={{ old('taluk') }}>
                         @error('taluk')
                           <p class="text-danger"> {{ $message }}</p>
                         @enderror
                </div>
                <div class="form-group col-md-4 mt-3">
                    <!-- <label for="inputZip">DISTRICT</label> -->
                    <input type="text" class="form-control" id="inputZip" placeholder="DISTRICT" name="district"
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
    
            <div class="form-group mt-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck" name="declaration" value=1>
                    <label class="form-check-label" for="gridCheck">
                        <b> DECLARATION</b>
                        <p>I have read and understood the rules for the allotment and occupation of quarters for police
                            personnel in kerala.I hereby declare that i shall abide by the said rules and all other rules
                            Government pay,from time to time ,make in this regard . The information furnished by me above
                            is correct and true to the best of my knowledge and belief
                        </p>
                    </label>
                    @error('declaration')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                  </div>
             </div>
         </div>
    
           
        </form>
       
      

      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-mdb-dismiss="modal">APPROVE</button>
        <button type="button" class="btn btn-danger">REJECT</button>
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="examplemodal">CLOSE</button> -->
        <button type="button" class="btn btn-secondary" data-dismiss="modal">CLOSE</button>
        <!-- <button type="button" class="btn btn-primary">Understood</button> -->
      </div>
    </div>
    </div>
  </div>
</div> 
<!-- Modal  notification -->
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog"> 
    
      <!-- Modal content-->
       <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div> 

          
</main>

@endsection