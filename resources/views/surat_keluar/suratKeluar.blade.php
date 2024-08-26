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
              <h3 class="fw-bold mb-3">Surat Keluar</h3>
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
                  <a href="#">Surat Keluar</a>
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
                        @foreach($surat_dokbasts as $p)
                          <tr>
                            <td>{{ $p->ticketNo }}</td>
                            <td>{{ $p->tglSurat }}</td>
                            <td>{{ $p->prihal }}</td>
                            <td>
                              <a href="suratKeluar/show/{{ $p->id }}" class="btn btn-warning">
                                <i class="fa fa-eye"></i>
                              </a>
                              <a href="suratKeluar/download/{{ $p->id }}" class="btn btn-success">
                                <i class="fa fa-download"></i>
                              </a>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm{{ $p->id }}" data-id="">
                                <i class="fa fa-location-arrow"></i>
                            </button>
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

    @foreach($surat_dokbasts as $p)
      <div class="modal fade" id="modalForm{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Lokasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    @if ( $p->id  == 1)
                      <img src="{{ url('/img/lokasi/1.png') }}" >
                    @endif
                    @if ( $p->id  == 2)
                      <img src="{{ url('/img/lokasi/2.png') }}" >
                    @endif
                    @if ( $p->id  == 3)
                      <img src="{{ url('/img/lokasi/3.png') }}" >
                    @endif
                    @if ( $p->id  == 4)
                      <img src="{{ url('/img/lokasi/4.png') }}" >
                    @endif
                    @if ( $p->id  == 5)
                      <img src="{{ url('/img/lokasi/5.png') }}" >
                    @endif
                    @if ( $p->id  == 6)
                      <img src="{{ url('/img/lokasi/6.png') }}" >
                    @endif
                </div> 
              </div>
            </div>
        </div>
      </div>
    @endforeach
    @include('layout.footer');
  </body>
</html>
