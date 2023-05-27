@extends('layouts.unitHead-dashboard')
@section('content')


<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
            <button type="button" class="close" data-dismiss="alert"> x</button>
        </div>
    @endif
</div>


  
 <!-- when user submits an application -->
 @if(count($applicants) )   


 
 <div class="card hover">
    <div class="card-img" > <img src="{{ asset('storage/' . $applicant->photo) }}" />
        <div class="overlay">
            <div class="overlay-content">
                <a class="hover" href="{{ route('unitHead-previewApplication',[$applicant->id])}}">View Application </a>
            </div>
        </div>
    </div>
    <div class="card-content border text-bg-warning">
        <a href="{{ route('unitHead-application_requests')}}">
            <h2>New Application Received</h2>
            <p class="d-flex justify-content-center"> Click to Review</p>
        </a>
    </div>
</div>




  @foreach ($applicants as $key => $applicant)

 <div class="card hover">
     <div class="card-img" > <img src="{{ asset('storage/' . $applicant->photo) }}" />
         <div class="overlay">
             <div class="overlay-content">
                 <a class="hover" href="{{ route('unitHead-previewApplication',[$applicant->id])}}">View Application </a>
             </div>
         </div>
     </div>
     <div class="card-content border text-bg-warning">
         <a href="{{ route('unitHead-application_requests')}}">
             <h2>New Application Received</h2>
             <p class="d-flex justify-content-center"> Click to Review</p>
         </a>
     </div>
 </div>

 @endforeach
@endif 

<script>
    $(document).ready(function() {
$('.card').delay(1800).queue(function(next) {
    $(this).removeClass('hover');
    $('a.hover').removeClass('hover');
    next();
});
});
</script>



<style>
    * {
     box-sizing: border-box;
}
 html, body {
     width: 100%;
     height: 100%;
}
 body {
     padding: 1rem 0;
     background: #f9f9fb;
}
 .card {
     width: 300px;
     display: inline-block;
     margin: 1rem;
     border-radius: 4px;
     box-shadow: 0 -1px 1px 0 rgba(0, 0, 0, .05), 0 1px 2px 0 rgba(0, 0, 0, .2);
     transition: all 0.2s ease;
     background: #fff;
     position: relative;
     overflow: hidden;
}
 .card:hover, .card.hover {
     transform: translateY(-4px);
     box-shadow: 0 4px 25px 0 rgba(0, 0, 0, .3), 0 0 1px 0 rgba(0, 0, 0, .25);
}
 .card:hover .card-content, .card.hover .card-content {
     box-shadow: inset 0 3px 0 0 #ccb65e;
     border-color: #ccb65e;
}
 .card:hover .card-img .overlay, .card.hover .card-img .overlay {
     background-color: rgba(25, 29, 38, .85);
     transition: opacity 0.2s ease;
     opacity: 1;
}
 .card-img {
     position: relative;
     height: 224px;
     width: 100%;
     background-color: #fff;
     transition: opacity 0.2s ease;
     background-position: center center;
     background-repeat: no-repeat;
     background-size: cover;
}
 .card-img .overlay {
     position: absolute;
     left: 0;
     top: 0;
     width: 100%;
     height: 100%;
     background-color: #fff;
     opacity: 0;
}
 .card-img .overlay .overlay-content {
     line-height: 224px;
     width: 100%;
     text-align: center;
     color: #fff;
}
 .card-img .overlay .overlay-content a {
     color: #fff;
     padding: 0 2rem;
     display: inline-block;
     border: 1px solid rgba(255, 255, 255, .4);
     height: 40px;
     line-height: 40px;
     border-radius: 20px;
     cursor: pointer;
     text-decoration: none;
}
 .card-img .overlay .overlay-content a:hover, .card-img .overlay .overlay-content a.hover {
     background: #ccb65e;
     border-color: #ccb65e;
}
 .card-content {
     width: 100%;
     min-height: 104px;
     background-color: #fff;
     border-top: 1px solid #e9e9eb;
     border-bottom-right-radius: 4px;
     border-bottom-left-radius: 4px;
     padding: 1rem 2rem;
     transition: all 0.2s ease;
}
 .card-content a {
     text-decoration: none;
     color: #202927;
}
 .card-content h2, .card-content a h2 {
     font-size: 1.5rem;
     text-align: center;
     font-weight: 500;
}
 .card-content p, .card-content a p {
     font-size: 1.5rem;
     font-weight: 400;
     white-space: nowrap;
     overflow: hidden;
     text-overflow: ellipsis;
     color: rgba(32, 41, 28, .8);
}
    </style>
@endsection
