<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        @if (auth()->user()->applied)
            <li class="nav-item">
                <a class="nav-link " href="/unit_head">
                    <i class="bi bi-house"></i>
                    <span>Home</span>
                </a>
            </li>
            <!--    Add Unit Head info through a Form : unithead_name, Date in office,
                  Date of Retirement, tel_no, RI_name, ri_contact  -->
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-manageProfile') }}">
                    <i class="bi bi-person"></i>
                    <span>Manage Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-applicationRequests') }}">
                    <i class="bi bi-inbox"></i>
                    <span>Application inbox</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-listPendingConfirmations') }}">
                    <i class="bi bi-building"></i>
                    <span> Pending Confimations </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-selectSeniorityListType') }}">
                    <i class="bi bi-clipboard-check"></i>
                    <span>Seniority List</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-viewAllOccupants') }} ">
                    <i class="bi bi-people"></i>
                    <span>View Occupants</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="{{ route('unitHead-viewAllQuarters') }}">
                    <i class="bi bi-building"></i>
                    <span>View Quarters </span>
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link " href="{{ route('unitHead-reports') }}">
                <i class="bi bi-list-check"></i>
                <span>Report Manager </span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="{{ route('signout') }}">
                <i class="bi bi-box-arrow-right"></i>
                <span>Logout</span>
            </a>
        </li>
    </ul>
</aside>
