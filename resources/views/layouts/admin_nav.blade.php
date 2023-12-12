<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{url('dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#company" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Company</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="company" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('company')}}">
          <i class="bi bi-circle"></i><span>All Companies</span>
        </a>
      </li>
      <li>
        <a href="{{url('company/create')}}">
          <i class="bi bi-circle"></i><span>Add New </span>
        </a>
      </li>
      
   
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#employee" data-bs-toggle="collapse" href="#">
      <i class="bi bi-menu-button-wide"></i><span>Employee</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="employee" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="{{url('employee')}}">
          <i class="bi bi-circle"></i><span>All Employees</span>
        </a>
      </li>
      <li>
        <a href="{{url('employee/create')}}">
          <i class="bi bi-circle"></i><span>Add New </span>
        </a>
      </li>
      
   
    </ul>
  </li>
 
 
 

</ul>

</aside>
