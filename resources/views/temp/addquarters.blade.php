@extends("layout.dashboardri")

@section("content")

<main id="main" class="main"> 
<div class="row">
          <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
            <div class="form-area mt-5 p-lg-4 p-3">
<!--               main form start -->
              <form>
                <div class="row">
                  <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                    <h3>ADD QUARTERS DETAILS OF VACANT AND NEW ONE</h3>
                  </div>
                </div>
                <dl class="row">
                  <dt class="col-sm-4 text-info font-secondary">Quarters Name*</dt>
                  <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Name"></dd>



                  <dt class=" col-sm-4 text-info font-secondary">Type*</dt>
                  <dd class="col-sm-8">
                    <input type="Email" class="form-control text-info" placeholder="Type">
                  </dd>

                  <dt class="col-sm-4 text-info font-secondary">Class</dt>
                  <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Class"></dd>

                  <dt class="col-sm-4 text-truncate text-info font-secondary">Quarters number</dt>
                  <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Quarters number"></dd>
                  
                  <!-- <dt class="col-sm-4 text-truncate text-info font-secondary">Passport Number</dt>
                  <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Passport Number"></dd> -->
                </dl>
                <div class="row">
                  <div class="col-sm-12">
                    <input type="submit" class="form-control bg-info text-light font-secondary" value="Submit" >
                  </div>
                </div>
              </form>
<!--               main form end -->
            </div>
          </div>
        </div>

</main>

  
<script src="assets/js/main.js"></script> 


@endsection