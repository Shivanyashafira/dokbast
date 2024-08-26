<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
        <a href="{{route('dashboard/index')}}" class="logo">
          <p class="text-white">
            DOKBAST
          </p>
        </a>
        <div class="nav-toggle">
          <button class="btn btn-toggle toggle-sidebar">
            <i class="gg-menu-right"></i>
          </button>
          <button class="btn btn-toggle sidenav-toggler">
            <i class="gg-menu-left"></i>
          </button>
        </div>
        <button class="topbar-toggler more">
          <i class="gg-more-vertical-alt"></i>
        </button>
      </div>
      <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
      <div class="sidebar-content">
        <ul class="nav nav-secondary">
          <li class="nav-item {{request()->is('/') ? 'active' : ''}}">
            <a href="{{route('dashboard/index')}}">
              <i class="fa fa-desktop"></i>
              <p>Beranda</p>
            </a>
          </li>
          @if ($user->posisi != null)
            @if ($user->posisi == 'Assets')
            <li class="nav-item {{request()->is('kelolaDokumen') ? 'active' : ''}}">
              <a href="{{route('kelolaDokumen/index')}}">
                <i class="fa fa-envelope"></i>
                <p>Kelola Dokumen</p>
              </a>
            </li>
            @endif
            
            <li class="nav-item {{request()->is('suratMasuk') ? 'active submenu' : ''}} {{request()->is('suratKeluar') ? 'active submenu' : ''}}">
              <a data-bs-toggle="collapse" href="#forms">
                <i class="fa fa-file"></i>
                <p>Data Surat</p>
                <span class="caret"></span>
              </a>
              <div class="collapse {{request()->is('suratMasuk') ? 'show' : ''}} {{request()->is('suratKeluar') ? 'show' : ''}}" id="forms">
                <ul class="nav nav-collapse">
                  
                  <li class="{{request()->is('suratMasuk') ? 'active' : ''}}">
                    <a href="{{route('suratMasuk/index')}}">
                      <span class="sub-item">Surat Masuk</span>
                      <span class="badge badge-success">{{ session('suratMasuk') }}</span>
                    </a>
                  </li>
                  
                  <li class="{{request()->is('suratKeluar') ? 'active' : ''}}">
                    <a href="{{route('suratKeluar/index')}}">
                      <span class="sub-item">Surat Keluar</span>
                      <span class="badge badge-success">{{ session('suratKeluar') }}</span>
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            {{-- <li class="nav-item {{request()->is('daftarBAST') ? 'active' : ''}}">
              <a href="{{route('daftarBAST/index')}}">
                <i class="fa fa-desktop"></i>
                <p>Daftar BAST</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('rekapBAST/index')}}">
                <i class="fa fa-desktop"></i>
                <p>Rekap BAST</p>
              </a>
            </li> --}}
            <li class="nav-item ">
              <a href="{{route('upload/index')}}">
                <i class="fa fa-upload"></i>
                <p>Unggah</p>
              </a>
            </li>
            @if ($user->posisi == 'Assets')
              <!-- <li class="nav-item ">
                <a href="{{route('kelolaKaryawan')}}">
                  <i class="fa fa-user"></i>
                  <p>Kelola Karyawan</p>
                </a>
              </li> -->
            @endif
          @endif
          <li class="nav-item">
            <a class="dropdown-item" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
              <i class="fa fa-angle-left"></i>
              <p>Keluar</p>
          </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
              @csrf
          </form>
        </ul>
      </div>
    </div>
  </div>
    
    
  <!-- End Sidebar -->