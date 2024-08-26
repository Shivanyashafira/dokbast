<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.head')
</head>
  <body>
    <div class="wrapper">
      @include('layout.menu')

      <div class="main-panel">
        @include('layout.navbar')

        <div class="container">
          <div class="page-inner">
            <div
              class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4"
            >
              <div>
                <h3 class="fw-bold mb-3">Dashboard</h3>
              </div>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="fa fa-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Dashboard</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                        <i class="fa fa-envelope"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Surat Masuk</p>
                          <h4 class="card-title">{{$suratMasuk}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-info bubble-shadow-small"
                        >
                        <i class="fa fa-envelope"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Jumlah Surat Keluar</p>
                          <h4 class="card-title">{{$suratKeluar}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fa fa-envelope"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Kelola Dokumen</p>
                          <h4 class="card-title">{{$kelolaDokumen}}</h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              
            </div>
            
          </div>
        </div>

      </div>
    </div>
    @include('layout.footer');
  </body>
</html>
