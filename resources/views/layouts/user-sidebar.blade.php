<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
<br>
<ul class="sidebar-nav" id="sidebar-nav">
  
<li class="nav-item">
    <a class="nav-link " href="/user">
      <i class="bi bi-house"></i>
      <span>Home</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link " href="{{ route('user.notifications')}}">
      <i class="bi bi-printer"></i>
      <span> Dashboard</span>
    </a>  
  </li> 

  <li class="nav-item">
    <a class="nav-link " href="{{ route('user-newApplication') }}">
      <i class="bi bi-pencil-square"></i>
      <span>+New Application</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link " href="{{ route('user-myApplication')}}">
      <i class="bi bi-pen"></i>
      <span> My Application</span>
    </a>
  </li>
 
 <li class="nav-item">
    <a class="nav-link " href="#">
      <i class="bi bi-printer"></i>
      <span>Print Application</span>
    </a>  
  </li>   

  <li class="nav-item">
    <a class="nav-link " href="{{ route('user.self-vacate')}}">
      <i class="bi bi-box-arrow-left"></i>
      <span> Vacate</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="/userquartersstatus">
      <i class="bi bi-sticky"></i>
      <span>Quarters Status</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href=" {{ route('user-seniorityList')}}">
      <i class="bi bi-chat-right-text"></i>
      <span>Seniority List</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link " href="{{route('signout')}}">
      <i class="bi bi-box-arrow-right"></i>
      <span>Logout</span>
    </a>
  </li> 




</aside><!-- End Sidebar-->
