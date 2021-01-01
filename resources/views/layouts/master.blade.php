<!doctype html>
<html lang="en">

@include('layouts.head')

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="azure" data-background-color="black" data-image="{{ asset('admins/assets/img/sidebar-2.jpg')}}">
      <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
      <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
          Hello!!!
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="{{url('dashboard-beranda')}}">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          @if(\Auth::user()->role == 1)
          <li class="nav-item">
            <a class="nav-link" href="{{ url('guru/show')}}">
              <i class="material-icons">person</i>
              <p>Guru</p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a class="nav-link" href="{{ url('biodata')}}">
              <i class="material-icons">table</i>
              <p>Biodata</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('siswa/show')}}">
              <i class="material-icons">supervisor_account</i>
              <p>Siswa</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('matpel/show')}}">
              <i class="material-icons">menu_book</i>
              <p>Matpel</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('kelas/show')}}">
              <i class="material-icons">school</i>
              <p>Kelas</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="{{ url('keluar')}}">
              <i class="material-icons">exit_to_app</i>
              <p>Logouts</p>
            </a>
          </li>
          <!-- your sidebar here -->
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
        @include('layouts.navbar')
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <!-- your content here -->
          @yield('content')
        </div>
      </div>
      @include('layouts.footer')
      <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
      <a href="#" data-toggle="dropdown">
        <i class="fa fa-cog fa-2x"> </i>
      </a>
      <ul class="dropdown-menu">
        <li class="header-title"> Sidebar Filters</li>
        <li class="adjustments-line">
          <a href="javascript:void(0)" class="switch-trigger active-color">
            <div class="badge-colors ml-auto mr-auto">
              <span class="badge filter badge-purple active" data-color="purple"></span>
              <span class="badge filter badge-azure" data-color="azure"></span>
              <span class="badge filter badge-green" data-color="green"></span>
              <span class="badge filter badge-warning" data-color="orange"></span>
              <span class="badge filter badge-danger" data-color="danger"></span>
            </div>
            <div class="clearfix"></div>
          </a>
        </li>
        <li class="header-title">Images</li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('admins/assets/img/sidebar-1.jpg')}}" alt="">
          </a>
        </li>
        <li class="active">
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('admins/assets/img/sidebar-2.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('admins/assets/img/sidebar-3.jpg')}}" alt="">
          </a>
        </li>
        <li>
          <a class="img-holder switch-trigger" href="javascript:void(0)">
            <img src="{{ asset('admins/assets/img/sidebar-4.jpg')}}" alt="">
          </a>
        </li>
        
      </ul>
    </div>
    </div>
  </div>
  <!--   Core JS Files   -->
  @include('layouts.script')
</body>

</html>