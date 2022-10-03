<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>AdminLTE 3 | Dashboard</title>

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
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">

    @include('layout/component/side')

  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      @if(session()->has('Error'))
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> {{session('Error')}}</h5>
      </div>
  @endif
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    
    <!-- Main content -->
    @include('layout/component/input')


    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>


              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>nama</th>
                    <th>nik</th>
                    <th>alamat</th>
                    <th>status</th>
                    <th>desa</th>
                  </tr>
                  </thead>
                  <tbody id="tbody">

                  </tbody>
                </table>
            </div>

            <!-- /.card -->
          </div>
        </div>
      </div>
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
<!-- AdminLTE for demo purposes -->
<script src="{{asset('AdminLTE/dist')}}/js/demo.js"></script>
<!-- Page specific script -->
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": [ "excel", "pdf", "print"] //"copy", "csv", "colvis"
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  
// $(document).ready(function(){
//     $ajaxSetup({
//       headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')}
//       })
//     $('#formWarga').on('submit',
//       function(e){
//         e.preventDefault()
//         let url = $(this).attr('action')
//         let from = $(this).serialize()
//         $.post(url,{
//           type:'POST',
//           url:url,
//           data:{ 
//           'token':$('#_token').attr(),
//           'nama':$('#nama').val(),
//           'nik':$('#nik').val(),
//           'alamat':$('#alamat').val(),
//           'status':$('#status').val(),
//           'desa':$('#desa').val()
//           },
//           dataType:'json',
//           success : function(e){
//             console.log(e)
//           }
//         })
//       }
//     )
//   }

//   $('#search').keyup(function(){
//     let search= $('#search').val()
//     let url = "{{URL::to('search')}}"
//     if(search==""){
//       $('#tbody').html("")
//       $('#result').hide()
//     }else{
//       $.get(url,{search:search},function(data){
//         $('#tbody').empty().html(data)
//         $('#result').show()
//       })
//     }
//   })
// )


  
</script>
<script>
      const _token = document.querySelector('meta[name="csrf-token"]').content

  // TABLE DISPLAY
   const dataTble = async ()=> { 
     await fetch('http://127.0.0.1:8000/api_warga', { 
        method:'GET',
        headers: {
          // 'Accept' : 'aplication/json, text/plaint ,*/*',
          // 'Access-Control-Allow-Origin': '*',
          // "Content-Type": 'aplication/json',
          "X-CSRF-TOKEN":_token
          // $('meta[name="csrf-token"]').attr('content')
        }}).then((res)=>res.json())
     .then(function(res){ 
       let temp="";
       res.data.forEach(index => 
       temp +=
       `<tr>
        <td>${index.nama}</td>
        <td>${index.nik}</td>
        <td>${index.alamat}</td>
        <td>${index.status}</td>
        <td>${index.desa}</td>
        </tr>` 
        );
        const tbody =document.querySelector("#tbody").innerHTML=temp;
        console.log(res)
    })
      await fetch('http://127.0.0.1:8000/warga/token').then((res)=>res.json()).then((res)=>csrf2= res)
   }
    window.addEventListener("onLoad",dataTble())


let csrf2
    // console.log(token)
    const btn = document.querySelector("#button-sub")
    btn.addEventListener("click",async function(e){
      e.preventDefault() 
      const nama = document.querySelector('[name="nama"]')
      const nik = document.querySelector('[name="nik"]')
      const alamat = document.querySelector('[name="alamat"]')
      const desa = document.querySelector('[name="desa"]')
      const status = document.querySelector('[name="status"]')
      // const _token = document.querySelector('meta[name="csrf-token"]').content
      // const _token1 = document.querySelector('[name="_token"]')
      // const _token2= $('meta[name="csrf-token"]').attr('content')
      // const csrf2 = await fetch('http://127.0.0.1:8000/warga/token').then((res)=>res.json()).then((res)=>res)
      // console.log(_token1,_token2,_token3,csrf2)
      const formWarga = document.getElementById("formWarga");
      // const [nama,nik,alamat,desa,status] = Array.from(formWarga.elements) 
      const data={
        "nama":nama.value,
        "nik":nik.value,
        "alamat":alamat.value,
        "desa":desa.value,
        "status":status.value,
        "_token": _token
        // _token.content
        // '{{csrf_token()}}'
        
      }
      console.log(data,csrf2)

      console.log({"tokenFromAPP":data._token,"tokenFromAPI":"csrf2"})
      // console.log(csrf,csrf2,"token action")
      await fetch('http://127.0.0.1:8000/api_warga/create',{
        method:'POST',
        headers: {
          'Accept' : 'aplication/json, text/plaint ,*/*',
          'Access-Control-Allow-Origin': '*',
          "Content-Type": 'aplication/json',
          "X-CSRF-TOKEN":data._token
          // $('meta[name="csrf-token"]').attr('content')
        },
        body:JSON.stringify(data)
      }).then((res)=>res.json()).then((res)=>console.log(res))
      .then(function(){
        nama.value=''
        nik.value=''
        alamat.value=''
        desa.value=''
        status.value='Status'
      }).then(dataTble())
    })
  </script>
</body>
</html>
