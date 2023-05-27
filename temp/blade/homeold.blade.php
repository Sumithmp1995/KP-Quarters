@extends('layouts.unitHead-dashboard')
@section('content')
    <!-- card style ........................................ -->
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>


   
       
    <div class="grey-bg container-fluid">
        <section id="minimal-statistics">
            <div class="row">
                <div class="col-12 mt-3 mb-1">
                    <h4 class="text-uppercase">Minimal Statistics Cards</h4>
                    <p>Statistics on minimal cards.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-book-open primary font-large-2 float-right"></i>
                               
                                    </div>
                                    <div class="media-body text-right">
                                        <h3> {{ $applicants }}</h3>
                                        <span>New Applications</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                  <i class="icon-pencil primary font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>156</h3>
                                        <span>Pending Quarters Approvals</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">156</h3>
                                        <span>Pending Vacate Requests</span>
                                    </div>
                                    <div class="align-self-center">
                                        <i class="icon-direction danger font-large-2 float-right"></i>
                                        {{-- <i class="icon-user success font-large-2 float-right"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- card row 2 -->

            <div class="row">
                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-speech warning font-large-2 float-left"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3> {{ $applicants }}</h3>
                                        <span>New Notifications</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="align-self-center">
                                        <i class="icon-bubbles warning font-large-2 float-right"></i>
                                    </div>
                                    <div class="media-body text-right">
                                        <h3>156</h3>
                                        <span>New Applications</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-4 col-sm-12 col-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                    <div class="media-body text-left">
                                        <h3 class="success">156</h3>
                                        <span>Total Clients</span>
                                    </div>
                                    <div class="align-self-center">
                                        {{-- <i class="icon-direction danger font-large-2 float-right"></i> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card row 2 ends -->
    </div>
    </section>

    <!--  card ends  -->

    <section id="stats-subtitle">
        <div class="row">
            <div class="col-12 mt-3 mb-1">
                <h4 class="text-uppercase">Statistics With Subtitle</h4>
                <p>Statistics on minimal cards with Title &amp; Sub Title.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card overflow-hidden">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-pencil primary font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Total Posts</h4>
                                    <span>Monthly blog posts</span>
                                </div>
                                <div class="align-self-center">
                                    <h1>18,000</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <i class="icon-speech warning font-large-2 mr-2"></i>
                                </div>
                                <div class="media-body">
                                    <h4>Total Comments</h4>
                                    <span>Monthly blog comments</span>
                                </div>
                                <div class="align-self-center">
                                    <h1>84,695</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <h1 class="mr-2">$76,456.00</h1>
                                </div>
                                <div class="media-body">
                                    <h4>Total Sales</h4>
                                    <span>Monthly Sales Amount</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-heart danger font-large-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body cleartfix">
                            <div class="media align-items-stretch">
                                <div class="align-self-center">
                                    <h1 class="mr-2">$36,000.00</h1>
                                </div>
                                <div class="media-body">
                                    <h4>Total Cost</h4>
                                    <span>Monthly Cost</span>
                                </div>
                                <div class="align-self-center">
                                    <i class="icon-wallet success font-large-2"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    </div>
@endsection

<style>
    .grey-bg {
        background-color: #F5F7FA;
    }
</style>
