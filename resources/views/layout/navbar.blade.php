<div class="main-header">
    <div class="main-header-logo">
      <!-- Logo Header -->
      <div class="logo-header" data-background-color="dark">
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
    <!-- Navbar Header -->
    <nav
      class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
    >
      <div class="container-fluid">
        <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
          <li class="nav-item topbar-user dropdown hidden-caret">
              <span class="profile-username">
                @php
                    use Carbon\Carbon;
                    $currentTime = $now = Carbon::now('Asia/Jakarta');
                    if ($now->hour >= 5 && $now->hour < 12) {
                        $timeOfDay = 'Pagi';
                    } elseif ($now->hour >= 12 && $now->hour < 15) {
                        $timeOfDay = 'Siang';
                    } elseif ($now->hour >= 15 && $now->hour < 18) {
                        $timeOfDay = 'Sore';
                    } else {
                        $timeOfDay = 'Malam';
                    }
                @endphp
                
                <span class="op-7">Selamat @php
                    echo $timeOfDay
                @endphp,</span>
                <span class="fw-bold">{{$user->name}}</span>
                <img src="{{ asset('/img/user.png') }}" class="rounded" style="width: 50px">
              </span>                  
          </li>
        </ul>
      </div>
    </nav>
    <!-- End Navbar -->
  </div>