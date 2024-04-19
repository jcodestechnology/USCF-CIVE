<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">

<div class="d-flex align-items-center justify-content-between">
  <a href="" class="logo d-flex align-items-center">
    <img src="{{URL::asset('imports_dashboard/assets/img/lg.png')}}" alt="">
    <span class="d-none d-lg-block">USCF CIVE</span>
  </a>
  <i class="bi bi-list toggle-sidebar-btn"></i>
</div><!-- End Logo -->

<div class="search-bar">
  <form class="search-form d-flex align-items-center" method="POST" action="#">
    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
  </form>
</div><!-- End Search Bar -->

<nav class="header-nav ms-auto">
  <ul class="d-flex align-items-center">

    <li class="nav-item d-block d-lg-none">
      <a class="nav-link nav-icon search-bar-toggle " href="#">
        <i class="bi bi-search"></i>
      </a>
    </li><!-- End Search Icon-->

 

   

    <li class="nav-item dropdown pe-3">

    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
    <img src="{{ Auth::user()->profile}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</span>
                </a><!-- End Profile Image Icon -->
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <li class="dropdown-header">
                        <h6>{{ Auth::user()->firstname }} {{ Auth::user()->middlename }} {{ Auth::user()->lastname }}</h6>
                        <span>{{ Auth::user()->user_role }}</span> <!-- Assuming user_role is a field in your User model -->
                    </li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
        <li>
          <a class="dropdown-item d-flex align-items-center" href="profile">
            <i class="bi bi-person"></i>
            <span>My Profile</span>
          </a>
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li>
          <hr class="dropdown-divider">
        </li>

       
        <li>
          <hr class="dropdown-divider">
        </li>


<!-- Your HTML -->
<li>
    <a id="logout-link" class="dropdown-item d-flex align-items-center" href="{{ route('logout') }}" >
        <i class="bi bi-box-arrow-right"></i>
        <span>Sign Out</span>
    </a>
</li>




      </ul><!-- End Profile Dropdown Items -->
    </li><!-- End Profile Nav -->

  </ul>
</nav><!-- End Icons Navigation -->

</header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.html">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-heart-fill"></i><span>Sadaka</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
   
      <li>
        <a href="components-badges.html">
          <i class="bi bi-circle"></i><span>Matoleo yote</span>
        </a>
      </li>
      <li>
        <a href="components-breadcrumbs.html">
          <i class="bi bi-circle"></i><span>Sajili Aina ya sadaka</span>
        </a>
      </li>
     
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-file-earmark-bar-graph"></i>
<span>Report</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
   
      <li>
        <a href="components-badges.html">
          <i class="bi bi-circle"></i><span>Mapato</span>
        </a>
      </li>
      <li>
        <a href="components-breadcrumbs.html">
          <i class="bi bi-circle"></i><span>Matumizi</span>
        </a>
      </li>
     
    </ul>
  </li><!-- End Components Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people"></i><span>Wahumini</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
 
      <li>
        <a href="forms-elements.html">
          <i class="bi bi-circle"></i><span>Orodha ya wahumini</span>
        </a>
      </li>
     
      
    </ul>
  </li><!-- End Forms Nav -->
  <li class="nav-item">
    <a class="nav-link " href="maoni">
    <i class="bi bi-chat-left-text"></i>

      <span>Maoni</span>
    </a>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-newspaper"></i><span>Post za Ibada</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="tables-general.html">
          <i class="bi bi-circle"></i><span>Post Event</span>
        </a>
      </li>
      <li>
        <a href="jumapili">
          <i class="bi bi-circle"></i><span>Post Ibada ya Jumapili </span>
        </a>
      </li>
      <li>
        <a href="neno">
          <i class="bi bi-circle"></i><span>Post ya Neno la wiki</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-people"></i><span>Familia za kanisa</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
     
      <li>
        <a href="charts-apexcharts.html">
          <i class="bi bi-circle"></i><span>Kutengeneza Familia</span>
        </a>
      </li>
      <li>
        <a href="charts-echarts.html">
          <i class="bi bi-circle"></i><span>Kuratibu Familia</span>
        </a>
      </li>
    </ul>
  </li><!-- End Charts Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-wallet2"></i><span>Mali za Kanisa</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Kujaza Mali za Kanisa</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Kuratibu mali za kanisa</span>
        </a>
      </li>
      
    </ul>
  </li><!-- End Icons Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-music-note"></i><span>Vikundi vya uimbaji</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="icons-bootstrap.html">
          <i class="bi bi-circle"></i><span>Kusajili kikundi</span>
        </a>
      </li>
      <li>
        <a href="icons-remix.html">
          <i class="bi bi-circle"></i><span>Kuratibu kikundi</span>
        </a>
      </li>
      
    </ul>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="matangazopage">
    <i class="bi bi-megaphone"></i>

      <span>Matangazo ya kanisa</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="management">
    <i class="bi bi-megaphone"></i>

      <span>Management ya kanisa</span>
    </a>
  </li><!-- End Profile Page Nav -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
    <i class="bi bi-award"></i>

      <span>Viongozi wa kanisa</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-calendar"></i><span>Almanaki ya Kanisa</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="almanaki">
          <i class="bi bi-circle"></i><span>Kusajili Almanaki</span>
        </a>
      </li>
      <li>
        <a href="manage_almanaki">
          <i class="bi bi-circle"></i><span>Kuratibu Almanaki</span>
        </a>
      </li>
      
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link collapsed" href="users-profile.html">
    <i class="bi bi-chat-left-text"></i>

      <span>SMS</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link collapsed" href="kozi">
    <i class="bi bi-book"></i>


      <span>Register Programs</span>
    </a>
  </li>
</ul>

</aside><!-- End Sidebar-->

<script>

document.addEventListener('DOMContentLoaded', function() {
  var signOutLink = document.getElementById('logout-link');

// Add a click event listener to the logout link
signOutLink.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior

   
    // Use replaceState to replace the current history entry with the login page
    history.replaceState(null, null, '/login'); // Replace 'login.html' with your actual login page URL

    // Redirect the user to the logout page with the user ID as a query parameter
    window.location.href = `/login`; // Replace '/logout' with your actual logout route
});

// Listen for the 'popstate' event to handle back/forward button clicks
window.addEventListener('popstate', function(event) {
    // Redirect the user back to the login page
    window.location.href = '/login'; // Replace 'login.html' with your actual login page URL
});
});

</script>