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
              <h3 class="fw-bold mb-3">Kelola Karyawan</h3>
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
                  <a href="#">Kelola Karyawan</a>
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
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>NIP</th>
                            <th>Email</th>
                            <th>Posisi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($emp as $p)
                          <tr>
                            <td>{{ $p->name }}</td>
                            <td>{{ $p->nik }}</td>
                            <td>{{ $p->nip }}</td>
                            <td>{{ $p->email }}</td>
                            <td>{{ $p->posisi }}</td>
                            <td>{{ $p->status == 'Y' ? 'AKTIF' : 'TIDAK AKTIF' }}</td>
                            <td align="center">
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm{{ $p->id }}" data-id="">
                                <i class="fa fa-pencil"></i>
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

    @foreach($emp as $p)
      <div class="modal fade" id="modalForm{{ $p->id }}" tabindex="-1" role="dialog" aria-labelledby="modalFormLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalFormLabel">Update Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formModal" action="{{ route('kelolaKaryawan/update', ['id' => $p->id]) }}" method="POST">
                  @csrf
                  @method('PUT')
                    <div class="modal-body">
                        <!-- Isi form -->
                        <div class="form-group">
                            <label for="nama">Status:</label>
                            <select class="form-control" required id="position-option" name="status">
                              <option value="" disabled selected>PILIH STATUS</option>
                              <option value="Y">AKTIF</option>
                              <option value="N">TIDAK AKTIF</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="nama">Posisi:</label>
                          <select class="form-control" required id="position-option" name="posisi">
                            <option value="" disabled selected>PILIH STATUS</option>
                            <option value="Assets">Assets</option>
                            <option value="Kepala Bidang">Kepala Bidang</option>
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
