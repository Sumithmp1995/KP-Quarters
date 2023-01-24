@extends('layouts.unitHead-dashboard')

@section('content')
    <section class="intro">
        <div class="bg-image h-100" style="background-color: #638cca;">
            <div class="mask d-flex align-items-center h-100">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-0">
                                    <div class="table-responsive table-scroll" data-mdb-perfect-scrollbar="true"
                                        style="position: relative; height: 300px">
                                        <table class="table table-striped mb-0">
                                            <thead style="background-color: #afcef7;">
                                                <tr>
                                               
                                                    <th scope="col">Application No. </th>
                                                    <th scope="col">Name</th>
                                                    <th scope="col">Type of Applicant</th>
                                                    <th scope="col">Date of Application Submitted</th>
                                                    <th scope="col">Action</th>
                                                    <th scope="col"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($occupants as $occupant)
                                                    <tr> 
                                                   
                                                        <td>{{ $occupant->application_no }}</td>
                                                        <td>{{ $occupant->occupant_name }}</td>
                                                        <td>{{ $occupant->type }}</td>
                                                    
                                                        <td>{{ $occupant->updated_at }} Hrs</td>
                                                        <td> <a href="{{ route('unitHead.allotment_complete', [$occupant->allottee_id]  )}}" ><button type="button"  class="btn btn-success"
                                                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"> 
                                                             ALLOT 
                                                            </button></td></a>
                                                            
                                                            {{-- <td><button type="button" href="{{ URL::route('unitHead-askWilling',)}}" class="btn btn-success" >
                                                                ASK WILLING
                                                            </button></td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <!-- table end -->
    <!-- modal  -->

    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">ALLOTEMENT OF QUARTERS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fw-bold ">

                    <!-- table content  -->

                    <section class="vh-100" style="background-color: rgb(124, 174, 231)">
                        <div class="container h-100">
                            <div class="row d-flex justify-content-center align-items-center h-100">
                                <div class="col-lg-12 col-xl-11">
                                    <div class="card text-black" style="border-radius: 25px;">
                                        <div class="card-body p-md-5">
                                            <div class="row justify-content-center">
                                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">


                                                    <form class="mx-1 mx-md-4">

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" id="form3Example1c"
                                                                    class="form-control" />
                                                                <label class="form-label" for="form3Example1c"> NAME</label>
                                                            </div>
                                                        </div>

                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" id="form3Example3c"
                                                                    class="form-control" />
                                                                <label class="form-label" for="form3Example3c">PEN</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" id="form3Example3c"
                                                                    class="form-control" />
                                                                <label class="form-label" for="form3Example3c">UNIT</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" id="form3Example3c"
                                                                    class="form-control" />
                                                                <label class="form-label" for="form3Example3c">QUARTERS
                                                                    NAME</label>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex flex-row align-items-center mb-4">
                                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                                            <div class="form-outline flex-fill mb-0">
                                                                <input type="text" id="form3Example3c"
                                                                    class="form-control" />
                                                                <label class="form-label" for="form3Example3c">QUARTERS
                                                                    NUMBER</label>
                                                            </div>
                                                        </div>


                                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                                            <button type="button"
                                                                class="btn btn-primary btn-lg">send</button>
                                                        </div>

                                                    </form>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>


                    <!-- end TABLE -->
                    <!-- <br><button type="button" class="btn btn-success">CONFIRM</button>
          <button type="button" class="btn btn-danger">REJECT</button> -->

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary">Understood</button> -->
                </div>
            </div>
        </div>
    </div>
@endsection
