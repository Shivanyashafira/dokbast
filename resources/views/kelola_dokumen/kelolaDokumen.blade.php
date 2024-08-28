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
              <h3 class="fw-bold mb-3">Kelola Dokumen</h3>
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
                  <a href="#">Kelola Dokumen</a>
                </li>
              </ul>
              <div class="ms-md-auto py-2 py-md-0">
                <a href="{{route('addDokumen/index')}}" class="btn btn-primary btn-round">Tambah Surat</a>
              </div>
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
                            <th class="no-sort">No Dokumen</th>
                            <th>Tanggal</th>
                            <th class="no-sort">Perihal</th>
                            <th class="no-sort">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($surat as $p)
                          <tr>
                            <td>{{ $p->ticketNo }}</td>
                            <td>{{ $p->tglSurat }}</td>
                            <td>{{ $p->prihal }}</td>
                            <td width = '20%' align="center">
                              <a href="editDokumen/edit/{{ $p->id }}" class="btn btn-warning">
                                <i class="fa fa-pencil"></i>
                              </a>
                              <a href="hapusDokumen/hapus/{{ $p->id }}" class="btn btn-danger" data-confirm-delete="true">
                                <i class="fa fa-trash"></i>
                              </a>
                              @if ( $p->status == 'NEW')
                              {{-- <a href="kelolaDokumen/send/{{ $p->id }}" class="btn btn-primary">
                                <i class="fa fa-share"></i>
                              </a> --}}
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm{{ $p->id }}" data-id="">
                                <i class="fa fa-share"></i>
                            </button>
                              @endif
                              
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
    <!-- Modal -->
    @foreach($surat as $p)
      <div class="modal fade" id="modalForm{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Kirim Kepada</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModal" action="{{ route('kelolaDokumen/send', ['id' => $p->id]) }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="modal-body">
                        <!-- Isi form -->
                        <div class="form-group">
                            <label for="nama">Nama:</label>
                            <select class="form-control" id="position-option" required name="sendTo">
                              <option value="" disabled selected>PILIH NAMA</option>
                              @foreach ($employee as $e)
                                <option value="{{ $e->nama }}">{{ $e->nama }}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    @endforeach

    @include('layout.footer');
    
    @include('sweetalert::alert')
  </body>
</html>
