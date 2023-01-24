<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
        <!-- <a href="index.html" class="logo d-flex align-items-center"> -->

        <img src="{{ URL::to('/') }}/assets/img/favicon.png" height="80px;" alt="">
        <span class="d-none d-lg-block text-white">
            <h2>KPQMS</h2>
        </span>
        <!-- </a> -->
        <i class="bi bi-list toggle-sidebar-btn"></i>

    </div><!-- End Logo -->

    <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
            <input type="text" name="query" placeholder="Search" title="Enter search keyword">
            <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
    </div><!-- End Search Bar -->
    <span class="d-none d-lg-block text-white p-0">
        <h4>KERALA POLICE QUARTERS MANAGEMENT SYSTEM</h4>
    </span>

    <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

            <li class="nav-item d-block d-lg-none">
                <a class="nav-link nav-icon search-bar-toggle " href="#">
                    <i class="bi bi-search"></i>
                </a>
            </li><!-- End Search Icon-->

            @php
            $user = auth()->user();
            @endphp

            <li class="nav-item dropdown">
                <a class="nav-link nav-icon" data-toggle="dropdown" href="#">
                    <i class="bi bi-bell"></i>
                    <span class="badge bg-primary badge-number">6</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                    <li class="dropdown-header">
                        You have {{ $count = 4 }}new notifications
                        <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>

                    @forelse ($user->notifications as $notification)
                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                               <a href='{{ $notification->data['path']  ?? null }}'>
                                     <h4> {{ $notification->data['applicant_name'] }}</h4>
                                <p>{{ $notification->data['unit'] }}</p>
                                 <p>{{ $notification->data['message'] }}</p>
                                <p>{{ $notification->created_at }}</p> </a>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    @empty
                        <p> no notifications </p>
                    @endforelse


                    {{-- <li class="notification-item">
          <i class="bi bi-exclamation-circle text-warning"></i>
          <div>
            <h4>Lorem Ipsum</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>30 min. ago</p>
          </div>
        </li> --}}

                    {{-- <li>
          <hr class="dropdown-divider">
        </li> --}}

                    {{-- <li class="notification-item">
          <i class="bi bi-x-circle text-danger"></i>
          <div>
            <h4>Atque rerum nesciunt</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>1 hr. ago</p>
          </div>
        </li> --}}

                    {{-- <li>
          <hr class="dropdown-divider">
        </li> --}}

                    {{-- <li class="notification-item">
          <i class="bi bi-check-circle text-success"></i>
          <div>
            <h4>Sit rerum fuga</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>2 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li> --}}

                    {{-- <li class="notification-item">
          <i class="bi bi-info-circle text-primary"></i>
          <div>
            <h4>Dicta reprehenderit</h4>
            <p>Quae dolorem earum veritatis oditseno</p>
            <p>4 hrs. ago</p>
          </div>
        </li>

        <li>
          <hr class="dropdown-divider">
        </li> --}}
                    <li class="dropdown-footer">
                        <a href="#">Show all notifications</a>
                    </li>

                </ul><!-- End Notification Dropdown Items -->

            </li><!-- End Messages Nav -->

            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                    <img src="{{ URL::to('/') }}/assets/img/profile-img.png" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block ps-2"> {{ auth()->user()->name }}</span>
                    <!-- </a>          End Profile Iamge Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                        <li class="dropdown-header">
                            <h6>Kevin Anderson</h6>
                            <span>Web Designer</span>
                        </li>
                    </ul>

                    <!--<li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
            <i class="bi bi-gear"></i>
            <span>Account Settings</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>Need Help?</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

        <li>
          <a class="dropdown-item d-flex align-items-center" href="#">
            <i class="bi bi-box-arrow-right"></i>
            <span>Sign Out</span>
          </a>
        </li>

      </ul>       -->
                    <!-- </li> -->
                    <!-- End Profile Dropdown Items -->
                    <!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header><!-- End Header -->
