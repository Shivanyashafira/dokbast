<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.head')
  </head>
  <body>
    <div class="wrapper">
      @include('layout/menu')

      <div class="main-panel">
        @include('layout/navbar')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Surat Masuk</h3>
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
                  <a href="#">Surat Masuk</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="table-responsive">
                      <table
                        id="basic-datatables"
                        class="display table table-striped table-hover"
                      >
                        <thead>
                          <tr>
                            <th>No Dokumen</th>
                            <th>Tanggal</th>
                            <th>Prihal</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($surat as $p)
                          <tr>
                            <td>{{ $p->ticketNo }}</td>
                            <td>{{ $p->tglSurat }}</td>
                            <td>{{ $p->prihal }}</td>
                            <td>
                              <a href="suratMasuk/view/{{ $p->id }}" class="btn btn-warning">
                                <i class="fa fa-eye"></i>
                              </a>
                              <a href="suratMasuk/download/{{ $p->id }}" class="btn btn-success">
                                <i class="fa fa-download"></i>
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
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
