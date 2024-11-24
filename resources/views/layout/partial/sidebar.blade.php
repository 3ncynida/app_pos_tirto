<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{ asset('AdminLTE/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

    <span class="brand-text font-weight-light">{{ Auth::user()->role ?? 'Guest' }}</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">

    <!-- Sidebar user panel -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="https://imgs.search.brave.com/xF9VF73xT65Wic2V6Jp74V7RPsLGxqGSijUNEEdgcZo/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly9jZG4t/aWNvbnMtcG5nLmZy/ZWVwaWsuY29tLzI1/Ni8zMTM1LzMxMzU3/MTUucG5nP3NlbXQ9/YWlzX2h5YnJpZA" 
             class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">{{ Auth::user()->name ?? 'Guest' }}</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
      <div class="input-group" data-widget="sidebar-search">
        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-sidebar">
            <i class="fas fa-search fa-fw"></i>
          </button>
        </div>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Sekolah Section -->
        <li class="nav-item {{ Request::is('sekolah/*') ? 'menu-open' : '' }}">

          <a href="#" class="nav-link {{ Request::is('sekolah/*') ? 'active' : '' }}">
            <i class="nav-icon fas fa-school"></i>
            <p>
              Sekolah
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            @if (Auth::user() && Auth::user()->role === 'Admin')
              <li class="nav-item">
                <a href="{{ route('sekolah.category.index') }}" class="nav-link {{ Request::is('sekolah/category') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sekolah.product.index') }}" class="nav-link {{ Request::is('sekolah/product') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sekolah.customer.index') }}" class="nav-link {{ Request::is('sekolah/customer') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('sekolah.user.index') }}" class="nav-link {{ Request::is('sekolah/user') ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            @else
            <li class="nav-item">
              <a href="{{ route('sekolah.transaction.index') }}" class="nav-link {{ Request::is('sekolah/transaction') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Transaction</p>
              </a>
            </li>

            @endif
          </ul>
        </li>

        <!-- UI Menu Section -->
        <li class="nav-item {{ Request::is('UI/*') ? 'menu-open' : '' }}">

          <a href="#" class="nav-link {{ Request::is('UI/*') ? 'active bg-indigo' : '' }}">
            <i class="nav-icon fas fa-list-alt"></i>
            <p>
              UI Menu
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('UI.button') }}" class="nav-link {{ Request::is('UI/button') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Button</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.general') }}" class="nav-link {{ Request::is('UI/general') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>General</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.modals') }}" class="nav-link {{ Request::is('UI/modals') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Modals</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.navbar') }}" class="nav-link {{ Request::is('UI/navbar') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Navbar</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.ribbons') }}" class="nav-link {{ Request::is('UI/ribbons') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Ribbons</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.sliders') }}" class="nav-link {{ Request::is('UI/sliders') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Sliders</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.timeline') }}" class="nav-link {{ Request::is('UI/timeline') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>

                <p>Timeline</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('UI.icons') }}" class="nav-link {{ Request::is('UI/icons') ? 'active' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Icons</p>
              </a>
            </li>
          </ul>
        </li>


        <!-- Logout Section -->
        <li class="nav-item">
          <a href="#" class="nav-link"
             onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>Logout</p>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>

        <!-- Simple Link -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-th"></i>
            <p>
              Simple Link
              <span class="right badge badge-danger">New</span>
            </p>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <!-- /.sidebar -->
</aside>
