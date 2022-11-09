<aside class="main-sidebar position-fixed sidebar-light-cyan  bg-emerald-300   elevation-4">
  <div class="sidebar">
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
      @if (file_exists(public_path('image/{{Auth::user()->user_image}}')))
          <img src="{{asset('image')}}/{{Auth::user()->user_image}}" class="img-circle elevation-2" alt="User Image">
      @else
          <img src="{{asset('image')}}/default_user.png" class="img-circle elevation-2" alt="User Image">
      @endif
      </div>
      <div class="info">
        <a href="{{route('user_profile')}}" class="d-block">@if(Auth::check('name')) {{Auth::user()->name}} @else Nama belum di isi  @endif</a>
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

                <i class="nav-icon far fa-light fas fa-user-friends"></i>
                <p>Population</p>
              </a>
            </li>
              
            <li class="nav-item">
              <form action="{{route('logout')}}" method="POST" class="nav-link">
                @csrf
                <button type="submit" class="btn p-0">
                  <i class="nav-icon fa-light fas fa-walking"></i>
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