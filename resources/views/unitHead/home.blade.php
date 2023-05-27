@extends('layouts.unitHead-dashboard')
@section('content')
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x </button>
            </div>
        @endif
    </div>

    <!-------------------  ------  ACTION CENTRE card style ........................................ -->
    <div id="root">
        <div class="container-fluid pt-5">
            <div class="row align-items-stretch">
                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap border p-5">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title border p-2"> New
                            Applications <i class="bi bi-clipboard-check"> </i>
                        </h4>
                        <span class="hind-font caption-12 c-dashboardInfo__count"> {{ count($applicants) }}</span>
                        @if (count($applicants))
                            <a href="{{ route('unitHead-applicationRequests') }}">
                                <button class="btn btn-primary mb-3"> Process Request </button> </a>
                        @else
                            <p class="text-bg-success p-2"> No Pendings </p>
                        @endif
                    </div>
                </div>

                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap border p-5">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title border p-2">Pending
                            Confirmations <i class="bi bi-building"></i>
                        </h4>
                        <span class="hind-font caption-12 c-dashboardInfo__count"> {{ count($unconfirmedAllottees) }}
                        </span>
                        @if (count($unconfirmedAllottees))
                            <a href="{{ route('unitHead-listPendingConfirmations') }}"> <button
                                    class="btn btn-primary mb-3"> View more </button> </a>
                        @else
                            <p class="text-bg-success p-2"> No Pendings </p>
                        @endif
                    </div>
                </div>

                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap border p-5">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title border p-2">Pending
                            Allotment <i class="bi bi-building"></i>
                        </h4>
                        <span class="hind-font caption-12 c-dashboardInfo__count"> {{ count($allottees) }} </span>
                        @if (count($allottees))
                            <a href="{{ route('unitHead-listConfirmedAllottees') }}"> <button
                                    class="btn btn-primary mb-3"> Process Request </button> </a>
                        @else
                            <p class="text-bg-success p-2"> No Pendings </p>
                        @endif
                    </div>
                </div>

                <div class="c-dashboardInfo col-lg-3 col-md-6">
                    <div class="wrap border p-5">
                        <h4 class="heading heading5 hind-font medium-font-weight c-dashboardInfo__title border p-2">Vacate
                            Requests <i class="bi bi-person-fill"></i>
                        </h4>
                        <span class="hind-font caption-12 c-dashboardInfo__count"> {{ count($vacattees) }} </span>
                        @if (count($vacattees))
                            <a href="{{ route('unitHead-listVacateRequests') }}"> <button class="btn btn-primary mb-3">
                                    Process Request </button> </a>
                        @else
                            <p class="text-bg-success p-2"> No Pendings </p>
                        @endif
                    </div>
                </div>

                <!--------------------------------  INFORMATION STATS card ----------------------------------------->
                <div class="grey-bg container-fluid">
                    <section id="minimal-statistics">
                        <div class="row">
                            <div class="col-12 m-5 mb-1">
                                <h4 class="text-uppercase align-centre"> Statistics</h4>
                            </div>
                        </div>
                        <div class="grey-bg container-fluid">
                            <section id="minimal-statistics">
                                <div class="row">
                                    <div class="col-xl-3 col-sm-4 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="align-self-center">
                                                            <i class="icon-pencil primary font-large-2 float-left"></i>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <h3>{{ count($seniorityCount) }}</h3>
                                                            <span>Total Applicants enlisted in Seniority List</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="align-self-center">
                                                            <i class="icon-speech warning font-large-2 float-left"></i>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <h3> {{ count($LsqAllottees) }} </h3>
                                                            <span>Total lower Subordinate Applicants</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-4 col-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <div class="media d-flex">
                                                        <div class="align-self-center">
                                                            <i class="icon-graph success font-large-2 float-left"></i>
                                                        </div>
                                                        <div class="media-body text-right">
                                                            <h3>{{ count($UsqAllottees) }}</h3>
                                                            <span> Total Upper Subordinate Applicants </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!----------------------- row 2   ----------------------->

                                    <div class="grey-bg container-fluid">
                                        <section id="minimal-statistics">
                                            <div class="row">
                                                <div class="col-xl-3 col-sm-4 col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="media d-flex">
                                                                    <div class="align-self-center">
                                                                        <i
                                                                            class="icon-pencil primary font-large-2 float-left"></i>
                                                                    </div>
                                                                    <div class="media-body text-right">
                                                                        <h3>{{ $allotteesCount['totalAllottees'] }}</h3>
                                                                        <span> No. of Applicants allocated Quarters </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="media d-flex">
                                                                    <div class="align-self-center">
                                                                        <i
                                                                            class="icon-speech warning font-large-2 float-left"></i>
                                                                    </div>
                                                                    <div class="media-body text-right">
                                                                        <h3>{{ $allotteesCount['lsAllottees'] }}</h3>
                                                                        <span> Total lower Subordinate Allottees </span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-sm-4 col-12">
                                                    <div class="card">
                                                        <div class="card-content">
                                                            <div class="card-body">
                                                                <div class="media d-flex">
                                                                    <div class="align-self-center">
                                                                        <i
                                                                            class="icon-graph success font-large-2 float-left"></i>
                                                                    </div>
                                                                    <div class="media-body text-right">
                                                                        <h3>{{ $allotteesCount['usAllottees'] }}</h3>
                                                                        <span>Total Upper Subordinate Allottees</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="grey-bg container-fluid">
                                                    <section id="minimal-statistics">
                                                        <div class="row">
                                                            <div class="col-xl-3 col-sm-4 col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-pencil primary font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div class="media-body text-right">
                                                                                    <h3>{{ $quartersCount['totalq'] }}</h3>
                                                                                    <span>Total Quarters</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-sm-4 col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-speech warning font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div class="media-body text-right">
                                                                                    <h3> {{ $quartersCount['lsq'] }} </h3>
                                                                                    <span>Total Lower Subordinate
                                                                                        Quarters</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-xl-3 col-sm-4 col-12">
                                                                <div class="card">
                                                                    <div class="card-content">
                                                                        <div class="card-body">
                                                                            <div class="media d-flex">
                                                                                <div class="align-self-center">
                                                                                    <i
                                                                                        class="icon-graph success font-large-2 float-left"></i>
                                                                                </div>
                                                                                <div class="media-body text-right">
                                                                                    <h3>{{ $quartersCount['usq'] }}</h3>
                                                                                    <span>Total Upper Subordinate
                                                                                        Quarters</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                        </div>
                </div>
                <!--------------------------------  INFORMATION STATS card style ends ----------------------------------------->
            </div>
        </div>
    </div>
@endsection
