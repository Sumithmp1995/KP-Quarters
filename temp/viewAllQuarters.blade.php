@extends('layouts.user-dashboard')
@section('content')

    <div class="container-fluid">
        @unless (count($quarters))
            <b class="d-flex justify-content-center mt-3 pt-3"> No Quarters Found </b>
        @else
            <div class="cards">
                @foreach ($quarters as $quarter)
                    <section class="card">
                        <figure>
                            <div class="img-overlay hot-home">
                                <img src="https://media-cldnry.s-nbcnews.com/image/upload/t_fit-560w,f_auto,q_auto:best/newscms/2018_30/1355945/home-exterior-today-180726-tease.jpg"
                                    alt="Trulli">
                                <div class="overlay"><a href="">View Assets</a></div>
                            </div>
                            <figcaption class="border p-4 d-flex justify-content-center"> {{ $quarter->quarters_name }} -
                                {{ $quarter->quarters_no }}
                            </figcaption>
                        </figure>

                        <div class="card-content border p-3">
                            <section class="icons-home">

                                <div class="name-icon border p-3">
                                    <span>Category</span>
                                    <div class="icon">
                                        <span> {{ $quarter->class }}</span>
                                    </div>
                                </div>

                                <div class="name-icon border p-3">
                                    <span>Type</span>
                                    <div class="icon">
                                        <span>{{ $quarter->type }}</span>
                                    </div>
                                </div>

                                @if (!empty($quarter->status))
                                    <div class="name-icon border p-3 btn btn-success">
                                        <div class="icon ">
                                            <span> view Occupant
                                            </span>
                                        </div>
                                    </div>
                                @else
                                    <div class="name-icon border p-3">
                                        <div class="icon">
                                            <span> Not Occupied</span>
                                        </div>
                                    </div>
                                @endif
                            </section>
                        </div>
                    </section>
                    <!-- card ends -->
                @endforeach
            </div>
        @endunless
    </div>
    <script src="assets/js/main.js"></script>
@endsection
