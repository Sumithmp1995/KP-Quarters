@extends('layouts.user-dashboard')
@section('content')
    <link href="assets/css/usercard.css" rel="stylesheet"> <!-- Dashboard cards   -->
    <div>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
                <button type="button" class="close" data-dismiss="alert"> x</button>
            </div>
        @endif
    </div>

    <!-- card style ........................................ -->
    <div class="row">
        <div class="col-md-4">
            <a class="datcard my-3" href="#">
                <span style="color:white;" class="h4">Live updates</span>
                <p>Latest feed.</p>
                <div class="go-corner">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="datcard my-3" href="  {{ route('user-selectSeniorityListType') }} ">
                <span style="color:white;" class="h4">View My-Unit Seniority Lists </span>
                <p>View Seniority Lists</p>
                <div class="go-corner">
                </div>
            </a>
        </div>
        <div class="col-md-4">
            <a class="datcard my-3" href="#">
                <span style="color:white;" class="h4"> Quarters Rules</span>
                <p>View rules and regulations.</p>
                <div class="go-corner">
                </div>
            </a>
        </div>
    </div>

    <!--card action centre  -->
    <div class="card-body1">
        <div class="d-flex align-items-center">
            <div>
                <span style="color:white;" class="h4"> Application Status</span>
                <h4 class="my-1 text-info p-4 border-3 ">
                    @if (auth()->user()->remember_token == null)
                        Not applied yet.
                        <button class="btn btn-success mt-3" data-toggle="modal" data-target="#newApplicationModalLong">
                            Apply now
                        </button>
                    @else
                        @switch($applicantStatus)
                            @case(1)
                                Application submitted. Processed soon.
                                <a href="{{ route('user-myApplication') }}" class="btn btn-success mt-3"> View Application </a>
                            @break

                            @case(2)
                                Quarters Available. Waiting For Your Confirmation
                                <a href="{{ route('user-willingness') }}" class="btn btn-success mt-3"> Click to more.. </a>
                            @break

                            @case(3)
                                Sorry! Your Application has been Rejected for some Reason. Click to view more <br>
                                <a href="{{ route('user-myApplication') }}" class="btn btn-success mt-3 "> More details.. </a>
                            @break

                            @case(4)
                                You are Listed in seniority List <br>
                                <a href="{{ route('user-mySeniorityList') }}" class="btn btn-success mt-3 "> View Seniority List</a>
                            @break

                            @case(5)
                                Just one step to go.  Waiting for Unit head approval. <br>
                                <a href="{{ route('user-myApplication') }}" class="btn btn-success mt-3"> View Application </a>
                            @break

                            @case(6)
                                You have rejected the quarters which is not your priority. <br>
                                You'll be allotted to your priority quarters when ever it is vacant <br>
                                <a href="{{ route('user-myApplication') }}" class="btn btn-success mt-3"> View Application </a>
                            @break

                            @case(7)
                                You have rejected the quarters which is already in your priority list. <br>
                                You are expelled from seniority list. Click to apply again.
                                <button class="btn btn-success mt-3" data-toggle="modal" data-target="#newApplicationModalLong">
                                    Apply now
                                </button>
                            @break

                            @case(8)
                                Hey. You have been allotted quarters. Click to Download proceedings and reach out to your QM ! <br>
                                <button class="btn btn-success mt-3" data-toggle="modal" data-target="#howToGetOccupied"> More
                                    Details... </button>
                            @break

                            @case(9)
                                Quarters handing over completed. You are occupied ! <br>
                                <button class="btn btn-success mt-3" data-toggle="modal" data-target="#howToGetOccupied"> More
                                    Details... </button>
                            @break

                            @case(10)
                                Vacate request has been send. Verification will begin shortly.
                            @break

                            @case(11)
                                QM Confirmed your Vacate request .request has been forwarded to Unit head seat.
                            @break

                            @case(12)
                                You have been vacated. Click to apply again
                                <button class="btn btn-success mt-3" data-toggle="modal" data-target="#newApplicationModalLong">
                                    Apply now </button>
                            @break

                            @default
                                <span>Something went wrong, please try again</span>
                        @endswitch
                    @endif
                </h4>
            </div>
        </div>
    </div>

    <!-- Modal new application  -->
    <div class="modal fade" id="newApplicationModalLong" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">Read the instructions carefully</h5>
                </div>
                <div class="modal-body font-weight-bold">
                    1. Once application submitted, its can not be edit again <br>
                    2. Before proceeding you must verify the required documents <br>
                    3. The supporting documents either jpeg image or pdf with specified size <br>
                    4. The photo size less than 250 kB <br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Later</button>
                    <a href="{{ route('user-newApplication') }}"> <button type="button" class="btn btn-primary"> I Agree
                        </button> </a>
                </div>
            </div>
        </div>
    </div>


    <!--instuctions for quarters occupation  Modal -->
    <div class="modal fade" id="howToGetOccupied" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLabel"> Get Occupied</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times; </span>
                    </button>
                </div>
                <div class="modal-body">
                    + Download Your Proceedings from My Proceedings on the Downloads Tab <br>
                    + Get in touch with your QM
                    Office for further necessary actions
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="{{ route('user-viewDownloads') }}" class="btn btn-primary"> Download Proceedings</a>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        window.onload = function() {
            OpenBootstrapPopup();
        };
        function OpenBootstrapPopup() {
            const applicantStatus = " <?php echo $applicantStatus; ?> ";
            if(applicantStatus == 1)
            $("#applicationSubmitted").modal('show');
            if(applicantStatus == 2)
            $("#quartersAllocated").modal('show');
            if(applicantStatus == 6)
            $("#quartersFirstRejected").modal('show');
            if(applicantStatus == 7)
            $("#quartersFinalRejected").modal('show');
        }
    </script>


    <!-- allocated Modal -->
    <div class="modal fade" id="applicationSubmitted" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">  Congratulations </h5>
                </div>
                <div class="modal-body">
                    You have been submitted your application. Kindly wait for the approval. <br> Thank you!
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"> Ok </button>
                </div>
            </div>
        </div>
    </div>

    <!-- allocated Modal -->
    <div class="modal fade" id="quartersAllocated" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle"> New Quarters allocation</h5>
                </div>
                <div class="modal-body">
                    You have been allocated a quarters. Provide your willingness
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"> Ok </button>
                </div>
            </div>
        </div>
    </div>

    <!-- first rejected Modal -->
    <div class="modal fade" id="quartersFirstRejected" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-warning">
                    <h5 class="modal-title" id="exampleModalLongTitle">  </h5>
                </div>
                <div class="modal-body">
                    ഒഴിവുവന്ന ക്വാർട്ടേഴ്‌സിലേക്കുള്ള വില്ലിങ് നിരസിച്ചതിനാൽ അപേക്ഷയിൽ നിങ്ങൾ  തിരഞ്ഞെടുത്ത 
                    പ്രിയോറിറ്റി ലിസ്റ്റിൽ ഉൾപ്പെട്ട ക്വാർട്ടേഴ്സിലേക്ക് മാത്രമായി നിങ്ങളുടെ അപേക്ഷ പരിഗണിക്കുന്നതാണ്. 
                    Your rejection request has been Recorded. You are allotted the quarters in your priority when the same is vacant.  
                    Kindly wait...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"> Ok </button>
                </div>
            </div>
        </div>
    </div>

    <!-- finalt rejected Modal -->
    <div class="modal fade" id="quartersFinalRejected" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-bg-danger">
                    <h5 class="modal-title" id="exampleModalLongTitle">  </h5>
                </div>
                <div class="modal-body">
                    അനുവദിക്കപ്പെട്ടത് നിങ്ങൾ മുൻഗണന കൊടുത്തിരിക്കുന്ന ക്വാർട്ടേഴ്‌സ്
                    ആയതിനാൽ  നിങ്ങളുടെ അപേക്ഷ അസാധു ആകുന്നതും സീനിയോറിറ്റി ലിസ്റ്റിൽ നിന്നും നിങ്ങളെ പൂർണമായി
                    ഒഴിവാക്കിയതുമാകുന്നു. പുതിയ അപേക്ഷ നൽകുന്നതിനായി +New Application  Tab തിരഞ്ഞെടുക്കുക. 
                    Your rejection request has been Recorded. Your application has been invalidated and you are expelled from seniority list.
                    click +New Application  Tab for submit new application. Thank You! 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" data-dismiss="modal"> Ok </button>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/main.js"></script>
@endsection
