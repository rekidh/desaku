<aside class="main-sidebar position-fixed sidebar-light-cyan  bg-emerald-300   elevation-4">
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('/images')}}/{{Auth::user()->user_image}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="{{route('user_profile')}}" class="d-block">@if(Auth::check('name')) {{Auth::user()->name}} @else Nama belum di isi  @endif</a>
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
        <li class="nav-item menu-open">
            
            <li class="nav-item">
              <a href="{{route('dashboard')}}" class="nav-link">
                <i class=" nav-icon fas fa-columns"></i>
                <p>Dashboard</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{route('warga')}}" class="nav-link">
                <i class="nav-icon fa-light fas fa-users"></i>
                <p>Warga</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="pages/gallery.html" class="nav-link">
                <i class="nav-icon far fa-light fa-address-card"></i>
                <p>PKK</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="{{route('warga')}}" class="nav-link">
                <i class="nav-icon far fa-light fa-address-card"></i>
                <p>Population</p>
              </a>
            </li>
              
            <li class="nav-item">
              <form action="/logout" method="POST">
                @csrf
                <button type="submit" class="btn btn-block btn-outline-light btn-sm nav-link">
                  <i class="nav-icon fa-light far fa-arrow-alt-circle-left"></i>
                  <p>Logout</p>
                </button>
              </form>
            </li>
        </li>
      </ul>
    </nav>
        <!-- /.sidebar-menu -->
  </div>
</aside>