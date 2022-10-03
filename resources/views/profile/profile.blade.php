<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | User Profile</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist')}}/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('layout/component/navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-light-fuchsia  elevation-4">

    @include('layout/component/side')

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- error message -->
    @if(session()->has('update'))
      <div id="toastsContainerTopRight" class="toasts-top-right fixed">
          <div class="alert bg-success  fade show" >
              <strong class="mr-auto">Success</strong>
              <button data-dismiss="alert" type="button" class="ml-2 mb-1 close" aria-hidden="true">
                <span aria-hidden="true">×</span>
              </button>

            <div class="toast-body">{{session('update')}}</div>
          </div>
        </div>
    @endif
    @if(session()->has('updateErr'))
      <div id="toastsContainerTopRight" class="toasts-top-right fixed">
          <div class="alert bg-danger fade show" >
              <strong class="mr-auto">Upss!!</strong>
              <small>error</small>
              <button data-dismiss="alert" type="button" class="ml-2 mb-1 close" aria-hidden="true">
                <span aria-hidden="true">×</span>
              </button>

            <div class="toast-body">{{session('updateErr')}}</div>
          </div>
        </div>
    @endif

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-5">

            <!--  trigger modal -->

          <div class="modal fade " id="modal-lg" style="display: none;" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content"> 
                <div class="header ">
                  <button type="button" class="close mx-2 " data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <img name="imgPrev" class="mx-auto d-block img-circle col-sm-6 "
                    src="{{asset('/images')}}/{{Auth::user()->user_image}}" alt="User profile picture"
                    >
                  </div>
                <div class="modal-footer ">
                  <form method="POST" action="{{ route('userImage') }}" enctype="multipart/form-data">
                    @csrf
                    <input onchange="revImage()" type="file" class="form-control" name="image" id="image" />   
                    <button type="submit" class="btn btn-primary">Save changes</button>
                  </form>
                </div>
              </div>
              <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
          </div>


            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div  class="text-center">
                  <img name="profile_user" class="profile-user-img img-fluid img-circle"
                       src="{{asset('/images')}}/{{Auth::user()->user_image}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">Software Engineer</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{Auth::user()->email}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Join</b> <a class="float-right">{{Auth::user()->created_at}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>last update</b> <a class="float-right">{{Auth::user()->updated_at}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
            <!-- /.card -->
            <!-- activity -->
          <div class="col-md-7">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Activity</a></li>
                  {{-- <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Timeline</a></li> --}}
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Settings</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    
                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('AdminLTE/dist')}}/img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Shared publicly - 7:30 PM today</span>
                      </div>
                    </div>
                    <!-- /.post -->

                    <!-- Post -->
                    <div class="post clearfix">
                      <div class="user-block">
                        <img class="img-circle img-bordered-sm" src="{{asset('AdminLTE/dist')}}/img/user7-128x128.jpg" alt="User Image">
                        <span class="username">
                          <a href="#">Sarah Ross</a>
                          <a href="#" class="float-right btn-tool"><i class="fas fa-times"></i></a>
                        </span>
                        <span class="description">Sent you a message - 3 days ago</span>
                      </div>
                    </div>
                    <!-- /.post -->

                    
                  </div>


                  <div class="tab-pane" id="settings">
{{-- FORM IMAGE --}}
                    <form action="{{route('update_profile')}}" method="POST" class="form-horizontal">
                      @csrf
                      {{-- <input type="hidden" name="id" value="{{Auth::user()->id}}"> --}}
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" name="name" id="name" class="form-control"  placeholder="Name"
                          value="{{Auth::user()->name}}"
                          >
                          @error('name')
                            <div  class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="Email" class="col-sm-2 col-form-label" >Email</label>
                        <div class="col-sm-10">
                          <input type="email" name="email" id="email" class="form-control"  placeholder="Email"
                          value="{{Auth::user()->email}}"
                          >
                          @error('email')
                            <div  class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="password" id="password" class="form-control"  placeholder="Password">
                        </div>
                          @error('password')
                            <div  class="invalid-feedback">{{$message}}</div>
                          @enderror
                      </div>

                      <div class="form-group row">
                        <label for="new_password" class="col-sm-2 col-form-label">New Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="new_password" id="new_password" placeholder="New Password" class="form-control">
                           @error('new_password')
                            <div  class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="confirm_new_password" class="col-sm-2 col-form-label">Comfirm Password</label>
                        <div class="col-sm-10">
                          <input type="password" name="comfirm_new_password" id="comfirm_password" class="form-control"  placeholder="Comfirm Password">
                          @error('confirm_new_password')
                            <div  class="invalid-feedback">{{$message}}</div>
                          @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>


                  </div>
                  <!-- /.tab-pane -->
                </div>


                
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.2.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist')}}/js/adminlte.min.js"></script>
<script src="{{asset('AdminLTE/dist')}}/plugins/toastr/toastr.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist')}}plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  
  const showModal=()=>{
    const element = document.getElementById("modal-lg")
    element.classList.add("show")
    element.style.display ="block"
    element.setAttribute("role","dialog")

    // .getAttribute("src")
    // img.setAttribute("class", "democlass")
 
  }
  function revImage(){
    const imgprv = document.querySelector("[name='imgPrev']" )
    const image = document.getElementById("image" )
    imgprv.style.display='block'
    const oFReader = new FileReader()
    oFReader.readAsDataURL(image.files[0])
    oFReader.onload=function(oFEvent){
      imgprv.src=oFEvent.target.result
    }
  }
  const hideModal=()=>{
    const element = document.getElementById("modal-lg")
    element.classList.remove("show")
    element.style.display ="none"
    element.removeAttribute("role","dialog")
  }
  document.querySelector('[name="profile_user"]').addEventListener("click",showModal)
  document.querySelectorAll('[data-dismiss="modal"]').forEach(element => {
    element.addEventListener("click",hideModal)
  }); 
</script>
</body>
</html>
