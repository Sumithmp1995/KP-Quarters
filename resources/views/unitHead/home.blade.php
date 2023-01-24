@extends("layouts.unitHead-dashboard")
@section("content")

<!-- card style ........................................ -->

<div class="row">
  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Live updates</span>
      <p>Click here to go .</p>
      <div class="go-corner">
      </div>
    </a>
  </div>



  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Quarters status</span>
      <p>View and download reports.</p>
      <div class="go-corner">
      </div>
    </a>
  </div>
  <div class="col-md-4">
    <a class="datcard my-3" href="#">
      <span style="color:white;" class="h4">Rules and regulations</span>
      <p>Rules.</p>
      <div class="go-corner">
      </div>
    </a>
  </div>
</div>

<!-- card style ends  ........................................ -->
@unless ($motherUnitStatus)
 @else 
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Task', 'Hours per Day'],
        ['LSQ - MINISTERIAL',     {{ $motherUnitStatus->ministerial_ls_allotted_count }}],
        ['LSQ - EXECUTIVE',    {{ $motherUnitStatus->executive_ls_allotted_count }}],
        ['USQ - MINISTERIAL',      {{ $motherUnitStatus->ministerial_us_allotted_count }}],
        ['USQ - EXECUTIVE',      {{ $motherUnitStatus->executive_us_allotted_count }}],
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
    
@endunless


<link href="assets/css/usercard.css" rel="stylesheet">
@endsection