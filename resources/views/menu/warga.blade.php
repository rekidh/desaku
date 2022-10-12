<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>App Desah | Penduduk</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('AdminLTE/dist')}}/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins')}}/summernote/summernote-bs4.min.css">
  
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('layout/component/navbar')
  <!-- Main Sidebar Container -->
  @include('layout/component/side')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
 @if(session()->has('Error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> {{session('Error')}}</h5>
    </div>
  @endif

<section class="content-header ">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Penduduk</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Penduduk</li>
        </ol>
      </div>
    </div>
  </div>
</section>
    <!-- Main content -->
@include('layout/component/input')

  <div class="container-fluid container-md">
    <div class="card">
      <div class="card-header bg-cyan   ">
        <h3 class="card-title">Tabulasi Data Penduduk</h3>
      </div>

      <div class="card-body">

        <div class="row col-12 mt-1 mb-3">
          <div class="input-group col-7">
              <button class="btn btn-primary">
                {{-- <i class="fas fa-search fa-fw"></i> --}}
                Print
              </button>
          </div>
          <div class="input-group col-5" >
            <input class="form-control " name="search_input" type="search" placeholder="Cari..." aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-primary" name="search_btn">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nama</th>
              <th>KK</th>
              <th>NIK</th>
              <th>Tgl lahir</th>
              <th>Status</th>
              <th>Jenis kelamin</th>
              <th>Kelola</th>
            </tr>
          </thead>
          <tbody id="tbody">
          </tbody>
        </table>
        </div>
        <div class="row col-12 mt-1">
          <div class="col-7">
            <div class="dataTables_info" name="table_info" id="table_info" role="status" aria-live="polite">

            </div>
          </div>
          <div class="col-5 ">
            <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
              <ul class="pagination" name="pages_link">
                {{-- <a onclick=></a> --}}
                  {{-- link pages --}}
              </ul> 
            </div>
          </div>
        </div>

    </div>
  </div>
</div>
<footer class="main-footer">
  <div class="float-right d-none d-sm-block">
    <b>Version</b> 3.2.0
  </div>
  <strong>Copyright &copy; 2022<a href="https://adminlte.io">Ten</a>.</strong>software
</footer>
</body>
<!-- ./wrapper -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- jQuery -->
<script src="{{asset('AdminLTE/plugins')}}/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('AdminLTE/plugins')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/jszip/jszip.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/pdfmake/pdfmake.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/pdfmake/vfs_fonts.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-buttons/js/buttons.print.min.js"></script>
<script src="{{asset('AdminLTE/plugins')}}/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE/dist')}}/js/adminlte.min.js"></script>

<script src="{{asset('js')}}/table.js"  ></script>
</body>
</html>
