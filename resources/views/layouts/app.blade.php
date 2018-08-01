<!DOCTYPE html>
<html lang="{{config('app.locate')}}">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name','Laravel')}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  {{--  <!-- Tell the browser to be responsive to screen width -->  --}}
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{--  <!-- Bootstrap 3.3.6 -->  --}}
  <link rel="stylesheet" href="{{asset('adminLTE/bootstrap/css/bootstrap.min.css')}}">
  {{--  <!-- Font Awesome -->  --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  {{--  <!-- Theme style -->  --}}
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/AdminLTE.min.css')}}">
  {{--  <!-- AdminLTE Skins--> --}}
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/skins/skin-black.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/datepicker/datepicker3.css')}}">
</head>


<body class="hold-transition skin-black sidebar-mini">
  
  <div class="wrapper">
    {{--  <!-- Main Header -->  --}}
    <header class="main-header">
      <a href="#" class="logo">
        {{-- <!-- mini logo for sidebar mini 50x50 pixels --> --}}
        <span class="logo-mini"><b>T</b>POS</span>
        {{-- <!-- logo for regular state and mobile devices --> --}}
        <span class="logo-lg"><b>Tri</b> POS</span>
      </a>

      {{--  <!-- Header Navbar -->  --}}
      <nav class="navbar navbar-static-top" role="navigation">
        {{--  <!-- Sidebar toggle button-->  --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" >
          {{--  <span class="sr-only">Toggle navigation</span>  --}}
        </a>
        {{--  <!-- Navbar Right Menu -->  --}}
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            {{--  <!-- Messages: style can be found in dropdown.less-->  --}}
            <li class="dropdown messages-menu">
              {{--  <!-- Menu toggle button -->  --}}
              <ul class="dropdown-menu">
                
                  {{--  <!-- inner menu: contains the messages -->  --}}
                  <ul class="menu">
                    <li>
                    {{--  <!-- start message -->  --}}
                      <a href="#">
                        <div class="pull-left">
                          {{--  <!-- User Image -->  --}}
                          <img src="{{asset('public/images'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
                        </div>
                        
                      </a>
                    </li>
                    {{--  <!-- end message -->  --}}
                  </ul>
                  {{--  <!-- /.menu -->  --}}
                </li>
                
              </ul>
            </li>
           


            
           
            {{--  <!-- User Account Menu -->  --}}
            <li class="dropdown user user-menu">
              {{--  <!-- Menu Toggle Button -->  --}}
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{--  <!-- The user image in the navbar-->  --}}
                <img src="{{asset('images/'.Auth::user()->foto)}}" class="user-image" alt="User Image">
                {{--  <!-- hidden-xs hides the username on small devices so only the image appears. -->  --}}
                <span class="hidden-xs">
                  @if (Auth::user()->level==1)
                  <small>Admin</small>
                  @else
                  <small>Kasir</small>
                  @endif
                </span>
              </a>
              <ul class="dropdown-menu">
                {{--  <!-- The user image in the menu -->  --}}
                <li class="user-header">
                  <img src="{{asset('images/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}}
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                {{--  <!-- Menu Footer-->  --}}
                <li class="user-footer">
                  <div class="pull-left">
                    {{--  jangan dulu  --}}
                    {{--  <a href="{{route('user.profil')}}" class="btn btn-default btn-flat">Profile</a>  --}}
                  </div>
                  <div class="pull-right">
                    <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-default btn-flat">Sign out</a>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none">
                      {{csrf_field()}}
                    </form>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

    
    {{--  <!-- Left side column. contains the logo and sidebar -->  --}}
    <aside class="main-sidebar">

      {{--  <!-- sidebar: style can be found in sidebar.less -->  --}}
      <section class="sidebar">

        {{--  <!-- Sidebar user panel (optional) -->  --}}
        <div class="user-panel">
          <div class="pull-left image">
            <img src="{{asset('images/'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>@if (Auth::user()->level==1)
              <small>Admin</small>
              @else
              <small>Kasir</small>
              @endif
            </p>
            {{--  <!-- Status -->  --}}
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>


        {{--  <!-- Sidebar Menu -->  --}}
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          {{--  <!-- Optionally, you can add icons to the links -->  --}}
          <li><a href="{{ route('home') }}"> <i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>
          @if (Auth::user()->level==1)
              <li><a href="{{ route('kategori.index') }}"> <i class="fa fa-cube"></i> <span>Kategori</span></a></li>
              <li><a href="{{ route('produk.index') }}"> <i class="fa fa-cubes"></i> <span>Produk</span></a></li>
              {{--  
              <li><a href="{{route(member.index)}}"><i class="fa fa-credit"><span>Member</span></i></li>
              <li><a href="{{route(supplier.index)}}"><i class="fa fa-truck"><span>Supplier</span></i></li>
              <li><a href="{{route(pengeluaran.index)}}"><i class="fa fa-money"><span>Pengeluaran</span></i></li>
              <li><a href="{{route(user.index)}}"><i class="fa fa-user"><span>User</span></i></li>
              <li><a href="{{route(penjualan.index)}}"><i class="fa fa-upload"><span>Penjualan</span></i></li>
              <li><a href="{{route(pembelian.index)}}"><i class="fa fa-download"><span>Pembelian</span></i></li>
              <li><a href="{{route(laporan.index)}}"><i class="fa fa-file-pdf-o"><span>Laporan</span></i></li>
              <li><a href="{{route(setting.index)}}"><i class="fa fa-gears"><span>Setting</span></i></li>  --}}
          @else
              {{--  jangan dulu  --}}
              {{--  <li><a href="{{route(transaksi.index)}}"><i class="fa fa-shopping-cart"><span>Transaksi</span></i></li>  --}}
              {{--  <li><a href="{{route(transaksi.new)}}"><i class="fa fa-shopping-cart-plus"><span>Transaksi Baru</span></i></li>  --}}
          @endif
        </ul>
        {{--  <!-- /.sidebar-menu -->  --}}
      </section>
      {{--  <!-- /.sidebar -->  --}}
    </aside>


    {{--  <!-- Content Wrapper. Contains page content -->  --}}
    <div class="content-wrapper"> 
      {{--  <!-- Content Header (Page header) -->  --}}
      <section class="content-header">
        <h2>
          @yield('title')
        </h2>
        <ol class="breadcrumb">
          @section('breadcrumb')
          <li><a href="#"><i class="fa fa-dashboard"></i>Home</a></li>
          @show
        </ol>
      </section>
      {{--  <!-- /.content Header (Page header) -->  --}}

      {{--  <!-- Main content -->  --}}
      <section class="content container-fluid">
        @yield('content')
      </section>
      {{--  <!-- /.content -->  --}}
    </div>
    {{--  <!-- /.content-wrapper -->  --}}

    
    {{--  <!-- Main Footer -->  --}}
    <footer class="main-footer">
      {{--  <!-- To the right -->  --}}
      <div class="pull-right hidden-xs">
        Anything you want
      </div>
      {{--  <!-- Default to the left -->  --}}
      <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>
    {{--  <!-- /.Main Footer -->  --}
    
{{--  <!-- ./wrapper -->  --}}

{{--  <!-- REQUIRED JS SCRIPTS -->  --}}

{{--  <!-- jQuery 3.1.1 -->  --}}
<script src="{{asset('/js/jquery-3.1.1.js')}}"></script>
{{--  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>  --}}
{{--  <!-- Bootstrap 3.3.6 -->  --}}
<script src="{{asset('/adminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
{{--  <!-- AdminLTE App -->  --}}
<script src="{{asset('/adminLTE/dist/js/app.js')}}"></script>
<script src="{{asset('/adminLTE/dist/js/adminlte.js')}}"></script>
{{--  <!-- Chartjs -->  --}}
<script src="{{asset('/adminLTE/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('/adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/adminLTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('/adminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('/js/validator.js')}}"></script>
@yield('script')


   </body>
   </html>
