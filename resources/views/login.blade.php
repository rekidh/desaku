<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist')}}/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
  @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> {{session('loginError')}}</h5>
      </div>
  @endif
<div class="login-box ">
  <div class="login-logo">
    <a href="/"><b>Login </b>Admin</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in </p>

      <form action="{{route('login')}}" method="post">
        @csrf
        <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">
          <input required 
          type="email"
          name="email"
          value="{{old('email')}}"
          class="@error('email') is-invalid @enderror form-control border-0" 
          placeholder="Email">
          <div class="input-group-append  ">
            <div class="input-group-text border-0 ">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <div  class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">
          <input required 
          name="password"
          type="password" 
          class="@error('password') is-invalid @enderror form-control  border-0 " 
          placeholder="Password">
          <div class="input-group-append ">
            <div class="input-group-text border-0">
              <span class="fas fa-lock"></span>
            </div>
          </div>
           @error('password')
            <div  class="invalid-feedback">{{$message}}</div>
          @enderror
        </div>

        <div class="row">
          <div class="col-8">
            <div class="form-check form-switch">
              <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
              <label class="form-check-label" for="exampleRadios1">Ingat saya</label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary rounded-pill btn-block">Masuk</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mb-1"><a href="/*">Lupa Password ?</a></p>
      <p class="mb-0"><a href="/register" class="text-center">Registasi Member Baru</a></p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist')}}/js/adminlte.min.js"></script>
</body>
</html>
