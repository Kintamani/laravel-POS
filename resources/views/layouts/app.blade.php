<!DOCTYPE html>
<html lang="{{config('app.locate')}}">


<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('app.name','Laravel')}}</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  {{--  <!-- Tell the browser to be responsive to screen width -->  --}}
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  {{--  <!-- Bootstrap 3.3.6 -->  --}}
  <link rel="stylesheet" href="{{asset('/adminLTE/bootstrap/css/bootstrap.min.css')}}">
  {{--  <!-- Font Awesome -->  --}}
  <link rel="stylesheet" href="{{asset('/adminLTE/font-awesome/css/fontawesome.css')}}">
  {{--  <!-- Theme style -->  --}}
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/AdminLTE.min.css')}}">
  {{--  <!-- AdminLTE Skins--> --}}
  <link rel="stylesheet" href="{{asset('adminLTE/dist/css/skins/skin-blue.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('adminLTE/plugins/datatables/datepicker3.css')}}">
</head>


<body class="hold-transition skin-blue sidebar-mini">
  
  <div class="wrapper">
    {{--  <!-- Main Header -->  --}}
    <header class="main-header">
      <a href="#" class="logo">
        {{-- <!-- mini logo for sidebar mini 50x50 pixels --> --}}
        <span class="logo-mini"><b>A</b>LT</span>
        {{-- <!-- logo for regular state and mobile devices --> --}}
        <span class="logo-lg"><b>Admin</b>LTE</span>
      </a>

      {{--  <!-- Header Navbar -->  --}}
      <nav class="navbar navbar-static-top" role="navigation">
        {{--  <!-- Sidebar toggle button-->  --}}
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        {{--  <!-- Navbar Right Menu -->  --}}
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            {{--  <!-- Messages: style can be found in dropdown.less-->  --}}
            <li class="dropdown messages-menu">
              {{--  <!-- Menu toggle button -->  --}}
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  {{--  <!-- inner menu: contains the messages -->  --}}
                  <ul class="menu">
                    <li>
                    {{--  <!-- start message -->  --}}
                      <a href="#">
                        <div class="pull-left">
                          {{--  <!-- User Image -->  --}}
                          <img src="{{asset('public/images'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
                        </div>
                        {{--  <!-- Message title and timestamp -->  --}}
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        {{--  <!-- The message -->  --}}
                        <p> Why not buy a new awesome theme "?"</p>
                      </a>
                    </li>
                    {{--  <!-- end message -->  --}}
                  </ul>
                  {{--  <!-- /.menu -->  --}}
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            {{--  <!-- /.messages-menu -->  --}}


            {{--  <!-- Notifications Menu -->  --}}
            <li class="dropdown notifications-menu">
              {{--  <!-- Menu toggle button -->  --}}
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  {{--  <!-- Inner Menu: contains the notifications -->  --}}
                  <ul class="menu">
                    <li>
                    {{--  <!-- start notification -->  --}}
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    {{--  <!-- end notification -->  --}}
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            {{--  <!-- Tasks Menu -->  --}}
            <li class="dropdown tasks-menu">
              {{--  <!-- Menu Toggle Button -->  --}}
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-flag-o"></i>
                <span class="label label-danger">9</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 9 tasks</li>
                <li>
                  {{--  <!-- Inner menu: contains the tasks -->  --}}
                  <ul class="menu">
                    <li>
                        {{--  <!-- Task item -->  --}}
                      <a href="#">
                        {{--  <!-- Task title and progress text -->  --}}
                        <h3>
                          Design some buttons
                          <small class="pull-right">20%</small>
                        </h3>
                        {{--  <!-- The progress bar -->  --}}
                        <div class="progress xs">
                          {{--  <!-- Change the css width attribute to simulate progress -->  --}}
                          <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                            <span class="sr-only">20% Complete</span>
                          </div>
                        </div>
                      </a>
                    </li>
                    {{--  <!-- end task item -->  --}}
                  </ul>
                </li>
                <li class="footer">
                  <a href="#">View all tasks</a>
                </li>
              </ul>
            </li>
            {{--  <!-- User Account Menu -->  --}}
            <li class="dropdown user user-menu">
              {{--  <!-- Menu Toggle Button -->  --}}
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                {{--  <!-- The user image in the navbar-->  --}}
                <img src="{{asset('public/images'.Auth::user()->foto)}}" class="user-image" alt="User Image">
                {{--  <!-- hidden-xs hides the username on small devices so only the image appears. -->  --}}
                <span class="hidden-xs">Alexander Pierce</span>
              </a>
              <ul class="dropdown-menu">
                {{--  <!-- The user image in the menu -->  --}}
                <li class="user-header">
                  <img src="{{asset('public/images'.Auth::user()->foto)}}" class="img-circle" alt="User Image">

                  <p>
                    {{Auth::user()->name}}
                    <small>Member since Nov. 2012</small>
                  </p>
                </li>
                {{--  <!-- Menu Footer-->  --}}
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="{{route('user.profil')}}" class="btn btn-default btn-flat">Profile</a>
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
            {{--  <!-- Control Sidebar Toggle Button -->  --}}
            <li>
              <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
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
            <img src="{{asset('public/images'.Auth::user()->foto)}}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Alexander Pierce</p>
            {{--  <!-- Status -->  --}}
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>


        {{--  <!-- Sidebar Menu -->  --}}
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">HEADER</li>
          {{--  <!-- Optionally, you can add icons to the links -->  --}}
          <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> <span>Dasboard</span></a></li>
          @if (Auth::user()->level==1)
              <li><a href="{{route(kategori.index)}}"><i class="fa fa-cube"><span>Kategori</span></i></li>
              <li><a href="{{route(produk.index)}}"><i class="fa fa-cubes"><span>Produk</span></i></li>
              <li><a href="{{route(member.index)}}"><i class="fa fa-credit"><span>Member</span></i></li>
              <li><a href="{{route(supplier.index)}}"><i class="fa fa-truck"><span>Supplier</span></i></li>
              <li><a href="{{route(pengeluaran.index)}}"><i class="fa fa-money"><span>Pengeluaran</span></i></li>
              <li><a href="{{route(user.index)}}"><i class="fa fa-user"><span>User</span></i></li>
              <li><a href="{{route(penjualan.index)}}"><i class="fa fa-upload"><span>Penjualan</span></i></li>
              <li><a href="{{route(pembelian.index)}}"><i class="fa fa-download"><span>Pembelian</span></i></li>
              <li><a href="{{route(laporan.index)}}"><i class="fa fa-file-pdf-o"><span>Laporan</span></i></li>
              <li><a href="{{route(setting.index)}}"><i class="fa fa-gears"><span>Setting</span></i></li>
          @else
              <li><a href="{{route(transaksi.index)}}"><i class="fa fa-shopping-cart"><span>Transaksi</span></i></li>
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
        <h1>
          @yield('title')
          <small>Optional description</small>
        </h1>
        <ol class="breadcrumb">
          @section('breadcrumb')
          <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
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
<script src="{{asset('/adminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
{{--  <!-- Bootstrap 3.3.6 -->  --}}
<script src="{{asset('/adminLTE/bootstrap/js/bootstrap.min.js')}}"></script>
{{--  <!-- AdminLTE App -->  --}}
<script src="{{asset('/adminLTE/dist/js/app.js')}}"></script>
{{--  <!-- Chartjs -->  --}}
<script src="{{asset('/adminLTE/plugins/chartjs/Chart.min.js')}}"></script>

<script src="{{asset('/adminLTE/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('/adminLTE/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script src="{{asset('/adminLTE/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

<script src="{{asset('js/validator.js')}}"></script>
@yield('script')

{{--  <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->  --}}
   </body>
   </html>
