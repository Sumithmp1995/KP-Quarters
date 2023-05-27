<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
        <img src="/assets/img/favicon.png" height="80px;" alt="">
        <span class="d-none d-lg-block text-white">
            <h2>KPQMS</h2>
        </span>
        <!-- </a> -->
        <i class="bi bi-list toggle-sidebar-btn"></i>
    </div>
    <!-- End Logo -->

    <span class=" m-auto d-none d-lg-block text-white p-0">
        <h3>KERALA POLICE QUARTERS MANAGEMENT SYSTEM</h3>
    </span>
    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">
            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->
            <!-- End Messages Nav -->
            <li class="nav-item dropdown pe-3">
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ asset('storage/' . auth()->user()->photo ) }}"   class="rounded-circle" onerror= "this.onerror = null; this.src='{{ URL::to('/') }}/assets/img/profile-img.png' " />
                    <span class="d-none d-md-block ps-2"> {{ auth()->user()->name }} </span>
                    @if (auth()->user()->role == 3) 
                        <span class="d-none d-md-block ps-2"> <br> QM Admin</span>
                    @elseif(auth()->user()->role == 2)
                        <br><span class="d-none d-md-block ps-2"> Unit Head Admin</span>
                    @else
                        <br> <span class="d-none d-md-block ps-2"> User</span>
                    @endif
        </ul>
    </nav>
</header>
