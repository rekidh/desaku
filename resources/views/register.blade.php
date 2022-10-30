<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> Registration Page</title>
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
    @if(session()->has('registerError'))
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5><i class="icon fas fa-ban"></i> {{session('registerError')}}</h5>
      </div>
    @endif

    <div class="register-box mx-auto ">
      <div class="register-logo">
        <a href="/login"><b>App Desa</b> Registrasi</a>
      </div>

      <div class="card ">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Daftar Akun </p>

          <form action="{{route('userRegister')}}" method="post">
            @csrf
              <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">

                <input required type="text" name="name" value="{{old('name')}}"
                class=" @error('name') is-invalid @enderror form-control border-0 " 
                placeholder="Full name">

                <div class="input-group-append">
                  <div class="input-group-text border-0 ">
                    <span class="fas fa-user"></span>
                  </div>
                </div>
                @error('name')
                  <div  class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
            {{--  --}}
              <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">
                <input required type="email" name="email" value="{{old('email')}}"
                  class=" @error('email') is-invalid @enderror form-control border-0 " 
                  placeholder="Email">
                <div class="input-group-append">
                  <div class="input-group-text border-0 ">
                    <span class="fas fa-envelope"></span>
                  </div>
                </div>
                @error('email')
                  <div  class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              {{--fpassword  --}}
              <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">
                <input required type="password" name="password" 
                class="@error('password') is-invalid @enderror form-control border-0 " 
                placeholder="Password">
                <div class="input-group-append">
                  <div class="input-group-text border-0 ">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password')
                  <div  class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              {{--confirm pass  --}}
              <div class="input-group mb-3 border border-1 rounded-pill overflow-hidden">
                <input required type="password" name="password2" 
                class=" @error('password2') is-invalid @enderror form-control border-0 " 
                placeholder="Retype password">
                <div class="input-group-append">
                  <div class="input-group-text border-0 ">
                    <span class="fas fa-lock"></span>
                  </div>
                </div>
                @error('password2')
                  <div  class="invalid-feedback">{{$message}}</div>
                @enderror
              </div>
              <div class="row mt-5">
                <a href="/login" class="col-7">Saya telah memiliki akun</a>
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block rounded-pill">Daftar</button>
                  </div>
              </div>
          </form>
        </div>
      </div>
    </div>

</body>

<script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
