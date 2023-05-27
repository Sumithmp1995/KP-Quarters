<!-- ======= Sidebar - user ======= -->

<aside id="sidebar" class="sidebar">
    <br>
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="{{ route('user-home') }}">
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>
        
        @if (auth()->user()->remember_token == null ||
                auth()->user()->remember_token == 12 ||
                auth()->user()->remember_token == 7)
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" data-target="#newApplicationModal">
                    <i class="bi bi-pencil-square"></i>
                    <span>+New Application</span>
                </a>
            </li>
        @endif


        <li class="nav-item">
            <a class="nav-link " href="{{ route('user-manageProfile') }}">
                <i class="bi bi-person-fill"></i>
                <span> My Profile</span>
            </a>
        </li>

        @if (auth()->user()->applied == 1)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('user-myApplication') }}">
                    <i class="bi bi-pen"></i>
                    <span> My Application</span>
                </a>
            </li>
        @endif

        @if (auth()->user()->remember_token == 2 || auth()->user()->remember_token == 5)
            <li class="nav-item">
                <a class="nav-link " href="{{ route('user-myAllotment') }}">
                    <i class="bi bi-building"></i>
                    <span> My Quarters </span>
                </a>
            </li>
        @endif


        @if (auth()->user()->remember_token == 9)
            <li class="nav-item">
                <a class="nav-link " data-toggle="modal" data-target="#vacateModal">
                    <span>Vacate</span>
                    <i class="bi bi-box-arrow-left"></i>
                </a>
            </li>
        @endif

        @if (auth()->user()->remember_token != null && auth()->user()->remember_token < 8)
            <li class="nav-item">
                <a class="nav-link " href=" {{ route('user-mySeniorityList') }}">
                    <i class="bi bi-chat-right-text"></i>
                    <span> My Seniority List</span>
                </a>
            </li>
        @endif

        <li class="nav-item">
            <a class="nav-link " href=" {{ route('user-selectUnit') }}">
                <i class="bi bi-building"></i>
                <span> Quarters List </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href=" {{ route('user-viewDownloads') }}">
                <i class="bi bi-download"></i>
                <span> Downloads </span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link " href="{{ route('signout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
</aside><!-- End Sidebar-->



<!-- Modal  vacate-->
<div class="modal fade" id="vacateModal" tabindex="-1" role="dialog" aria-labelledby="vacateModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header  text-bg-danger">
                <h5 class="modal-title" id="vacateModalLabel"> Documents Needed !</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                You are about to Vacate the Quarters.
                Collect KSEB &
                KWA Nodues certificates Before Proceeding.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                <a class="nav-link " href="{{ route('user-selfVacate') }}"> <button type="button"
                        class="btn btn-primary">Proceed</button> </a>
            </div>
        </div>
    </div>
</div>


<!-- Modal new application -->

<div class="modal fade" id="newApplicationModal" tabindex="-1" role="dialog"
    aria-labelledby="newApplicationModalTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-bg-warning">
                <h5 class="modal-title" id="newApplicationModalTitle">Read the instructions carefully</h5>
                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> -->
            </div>
            <div class="modal-body font-weight-strong">
                1. Once application submitted, its can not be edit again <br>
                2. Before proceeding you must verify the required documents <br>
                3. The supporting documents either jpeg image or pdf with specified size <br>
                4. The photo size less than 250 kB <br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Later</button>
                <a href="{{ route('user-newApplication') }}"> <button type="button" class="btn btn-primary">I
                        Agree</button> </a>
            </div>
        </div>
    </div>
</div>
