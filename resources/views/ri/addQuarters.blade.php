@extends("layouts.ri-dashboard")
@section('content')

  <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-8 offset-lg-2">
              <div class="form-area mt-5 p-lg-4 p-3">
  <!--               main form start -->
                  <form action="{{ route('newQuarters')}}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-sm-12 text-center text-info mb-3 font-secondary">
                      <h3>ADD QUARTERS DETAILS OF VACANT AND NEW ONE</h3>
                    </div>
                  </div>
                  <dl class="row">
                    <dt class="col-sm-4 text-info font-secondary">Quarters Name*</dt>
                    <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Name" name="quarters_name">
                      @error('quarters_name')
                      <p class="text-danger"> {{ $message }}</p>
                  @enderror </dd>
  
  
  
                    <dt class=" col-sm-4 text-info font-secondary">Type*</dt>
                    <dd class="col-sm-8">
                      <div class="mb-4 pb-2">
                        <select class="form-control" name="type">
                          <option>QUARTERS TYPE</option>
                          <option value="FLAT">FLAT</option>
                          <option value="SINGLE">SINGLE</option>
                        </select>
                        @error('type')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                      </div>
                    </dd>
  
                    <dt class="col-sm-4 text-info font-secondary">Class</dt>
                    <dd class="col-sm-8">
                      <div class="mb-4 pb-2">
                        <select class="form-control" name="class">
                          <option> QUARTERS CLASS</option>
                          <option value="LSQ">LSQ</option>
                          <option value="USQ">USQ</option>
                        </select>
                        @error('class')
                        <p class="text-danger"> {{ $message }}</p>
                    @enderror
                      </div>
                    </dd>
  
                    <dt class="col-sm-4 text-truncate text-info font-secondary">Quarters number</dt>
                    <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Quarters number" name="quarters_no">
                    </dd>
                    
                    <!-- <dt class="col-sm-4 text-truncate text-info font-secondary">Passport Number</dt>
                    <dd class="col-sm-8"><input type="text" class="form-control" placeholder="Passport Number"></dd> -->
                  </dl>
                  <div class="row">
                    <div class="col-sm-12">
                      <button type="submit" class="btn btn-primary" > Register</button>
                    </div>
                  </div>
                </form>
  <!--               main form end -->
              </div>
            </div>
          </div>
@endsection