<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <!-- Dashboard Item -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('dashboard') }}">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>

    <!-- Patient Section -->
    <li class="nav-item {{ request()->routeIs('table') || request()->routeIs('add.index') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
        <i class="mdi mdi-account-multiple menu-icon"></i>
        <span class="menu-title">Patient</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="ui-basic">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('add.index') }}">Add Patient</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('table') }}">Patient Data</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Parents Section -->
    <li class="nav-item {{ request()->routeIs('parent.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('parent.index') }}">
        <i class="mdi mdi-account-multiple-outline menu-icon"></i>
        <span class="menu-title">Parents</span>
      </a>
    </li>

    <!-- Calendar Section -->
    <li class="nav-item {{ request()->routeIs('calendar.index') ? 'active' : '' }}">
      <a class="nav-link" href="{{ route('calendar.index') }}">
        <i class="mdi mdi-calendar-multiple menu-icon"></i>
        <span class="menu-title">Calendar</span>
      </a>
    </li>

    <!-- Medication Section -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-hospital menu-icon"></i>
        <span class="menu-title">Medication</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/tables/basic-table.html">Basic table</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- User Pages Section -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
        <i class="icon-head menu-icon"></i>
        <span class="menu-title">User Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="auth">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">Login</a>  
          </li>
          <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">Register</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Error Pages Section -->
    <li class="nav-item">
      <a class="nav-link" data-bs-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
        <i class="icon-ban menu-icon"></i>
        <span class="menu-title">Error Pages</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="error">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-404.html">404</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/samples/error-500.html">500</a>
          </li>
        </ul>
      </div>
    </li>

    <!-- Legal & Info Section -->
    <li class="nav-item {{ request()->routeIs('termsprivacy.index') || request()->routeIs('about.index') ? 'active' : '' }}">
      <a class="nav-link" data-bs-toggle="collapse" href="#legal-info" aria-expanded="false" aria-controls="legal-info">
        <i class="icon-paper menu-icon"></i>
        <span class="menu-title">About & Legal</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="legal-info">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('termsprivacy.index') }}">Terms & Privacy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('about.index') }}">About</a>
          </li>
        </ul>
      </div>
    </li>
  </ul>
</nav>
