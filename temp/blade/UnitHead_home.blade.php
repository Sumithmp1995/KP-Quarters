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


      <div class="col-md-12">
              <div class="col-xl-3 col-lg-3">
                  <div class="card l-bg-cherry">
                      <div class="card-statistic-3 p-4">
                          <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                          <div class="mb-4">
                              <h5 class="card-title mb-0"> Pending Applications</h5>
                          </div>
                          <div class="row align-items-center mb-2 d-flex">
                              <div class="col-8">
                                  <h2 class="d-flex align-items-center pl-3 mb-1">
                                     {{$applicants}}
                                  </h2>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      
      <div class="col-md-12">
            <div class="col-xl-3 col-lg-3">
                <div class="card l-bg-cherry">
                    <div class="card-statistic-3 p-4">
                        <div class="card-icon card-icon-large"><i class="fas fa-shopping-cart"></i></div>
                        <div class="mb-4">
                            <h5 class="card-title mb-0"> Pending Quarters Approval</h5>
                        </div>
                        <div class="row align-items-center mb-2 d-flex">
                            <div class="col-8">
                                <h2 class="d-flex align-items-center pl-3 mb-1">
                                   {{$allottees}}
                                </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



  <style>
    .card {
    background-color: #fff;
    border-radius: 10px;

    position: relative;
    margin-bottom: 30px;
    box-shadow: 0 0.46875rem 2.1875rem rgba(90,97,105,0.1), 0 0.9375rem 1.40625rem rgba(90,97,105,0.1), 0 0.25rem 0.53125rem rgba(90,97,105,0.12), 0 0.125rem 0.1875rem rgba(90,97,105,0.1);
}
.l-bg-cherry {
    background: linear-gradient(to right, #493240, #f09) !important;
    color: #fff;
}

.l-bg-blue-dark {
    background: linear-gradient(to right, #373b44, #4286f4) !important;
    color: #fff;
}

.l-bg-green-dark {
    background: linear-gradient(to right, #0a504a, #38ef7d) !important;
    color: #fff;
}

.l-bg-orange-dark {
    background: linear-gradient(to right, #a86008, #ffba56) !important;
    color: #fff;
}

.card .card-statistic-3 .card-icon-large .fas, .card .card-statistic-3 .card-icon-large .far, .card .card-statistic-3 .card-icon-large .fab, .card .card-statistic-3 .card-icon-large .fal {
    font-size: 110px;
}

.card .card-statistic-3 .card-icon {
    text-align: center;
    line-height: 50px;
    margin-left: 15px;
    color: #000;
    position: absolute;
    right: -5px;
    top: 20px;
    opacity: 0.1;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
}

.l-bg-green {
    background: linear-gradient(135deg, #23bdb8 0%, #43e794 100%) !important;
    color: #fff;
}

.l-bg-orange {
    background: linear-gradient(to right, #f9900e, #ffba56) !important;
    color: #fff;
}

.l-bg-cyan {
    background: linear-gradient(135deg, #289cf5, #84c0ec) !important;
    color: #fff;
} 
  </style>
      <!-- card 2 ends ........................................ -->  


{{-- 


      
    @unless($motherUnitStatus)
    @else
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {
                packages: ["corechart"]
            });
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                    ['Task', 'Hours per Day'],
                    ['LSQ - MINISTERIAL', {{ $motherUnitStatus->ministerial_ls_allotted_count }}],
                    ['LSQ - EXECUTIVE', {{ $motherUnitStatus->executive_ls_allotted_count }}],
                    ['USQ - MINISTERIAL', {{ $motherUnitStatus->ministerial_us_allotted_count }}],
                    ['USQ - EXECUTIVE', {{ $motherUnitStatus->executive_us_allotted_count }}],
                ]);

                var options = {
                    title: 'Total Quarters Occupancy Status',
                    is3D: true,
                };

                var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
                chart.draw(data, options);
            }
        </script>

        <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
    @endunless --}}


    <link href="assets/css/usercard.css" rel="stylesheet">
@endsection
