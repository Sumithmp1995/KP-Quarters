@extends('layouts.user-dashboard')
@section('content')
    <div class=" mt-2">
        <div class="row">
            <h3 class="d-flex justify-content-center border p-3 "> Downloads</h3>

            @if ($applicant)
                <div class="col-md-4 col-sm-6 item mt-5">
                    <div class="card item-card card-block">
                        <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg"
                            alt="Photo of sunset">
                        <a class="text-black" href=" {{ route('user-myApplication') }} ">
                            <h4 class="item-card-title mt-3  p-3 d-flex justify-content-center">My Application</h4>
                        </a>
                    </div>
                </div>
            @endif

            @if (auth()->user()->remember_token >= 8)
                <div class="col-md-4 col-sm-6 item mt-5">
                    <div class="card item-card card-block text-bg-success">
                        <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg"
                            alt="Photo of sunset">
                        <a class="text-white" href=" {{ route('user-downloadProceedings') }} ">
                            <h4 class="item-card-title p-3 mt-3 mb-3 d-flex justify-content-center"> My Proceedings</h4>
                        </a>
                    </div>
                </div>
            @endif

            @if (!empty($allottee->willingness))
                <div class="col-md-4 col-sm-6 item mt-5">
                    <div class="card item-card card-block">
                        <img src="https://static.pexels.com/photos/7096/people-woman-coffee-meeting.jpg"
                            alt="Photo of sunset">
                        <a class="text-black" href=" {{ route('user-myQuarters') }} ">
                            <h4 class="item-card-title p-3 mt-3 mb-3 d-flex justify-content-center"> My Quarters</h4>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
