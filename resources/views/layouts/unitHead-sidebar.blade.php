<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
<br>
<ul class="sidebar-nav" id="sidebar-nav">

<li class="nav-item">
    <a class="nav-link " href="/unit_head">
      <i class="bi bi-house"></i>
      <span>Home</span>
    </a>
  </li>

  <!-- Add Unit Head info through a Form : unithead_name, Date in office,
                Date of Retirement, tel_no, RI_name, ri_contact  -->   
  <li class="nav-item">
    <a class="nav-link " href="{{ route('unitHead-manage_profile')}}">
      <i class="bi bi-sticky"></i>
      <span>Manage Profile</span>      
    </a>
  </li>
<li class="nav-item">
    <a class="nav-link " href="{{ route('unitHead-application_requests')}}">
      <i class="bi bi-pencil-square"></i>
      <span>+Application inbox</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link " href="{{ route('unitHead-selectSeniorityListType') }}">
      <i class="bi bi-printer"></i>
      <span>Seniority List</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="#">
      <i class="bi bi-clipboard-check"></i>
      <span>View Occupants</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{ route('unitHead-quarters_status') }}">
      <i class="bi bi-sticky"></i>
      <span>Quarters Status</span>
    </a>
  </li>
   <li class="nav-item">
    <a class="nav-link " href="{{ route('unitHead.list_confirmed_allottees') }}">
      <i class="bi bi-chat-right-text"></i>
      <span>Allot Quarters </span>
    </a>
  </li> 
  <li class="nav-item">
    <a class="nav-link " href="{{ route('signout') }}">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
  </li> 




</aside><!-- End Sidebar-->
