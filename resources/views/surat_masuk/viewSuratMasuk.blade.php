<!DOCTYPE html>
<html lang="en">
  <head>
    @include('layout.head')
  </head>
  <body>
    <div class="wrapper">
        @include('layout/menu')

      <div class="main-panel">
        @include('layout.navbar')

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Surat  Masuk</h3>
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
                  <a href="#">Surat  Masuk</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Lihat Surat Masuk</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                  <div class="card">
                    <div class="card-header">
                      <input type="hidden" name="id" value="{{ $suratDokbast->id }}"> <br/>
                      <div class="card-title">Asset Yang Diserahkan</div>
                    </div>
                    <div class="card-body">
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Kode Barang</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Kode Barang" name="kodeBarang" readonly value="{{ $suratDokbast->kode_barang }}"/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Nama Barang</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Nama Barang" name="namaBarang" readonly value="{{ $suratDokbast->nama_barang }}"/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Spesifikasi Barang</label>
                            </div>
                        </div>
                        <div class="col-lg-8">
                          <input type="text" class="form-control" placeholder="Spesifikasi Barang" name="spesifikasiBarang" readonly value="{{ $suratDokbast->spesifikasi_barang }}"/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Jumlah Barang</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <input type="number" class="form-control" placeholder="Jumlah Barang" name="jumlahBarang" readonly value="{{ $suratDokbast->jumlah_barang }}"/>
                        </div>
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Satuan Barang</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <input type="text" class="form-control" placeholder="Satuan Barang" name="satuanBarang" readonly value="{{ $suratDokbast->satuan_barang }}"/>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-2">
                          <div class="form-group">
                            <label>Tanggal Diperoleh</label>
                            </div>
                        </div>
                        <div class="col-lg-3">
                          <input type="date" class="form-control" placeholder="Tanggal Diperoleh" name="tanggalDiperoleh" readonly value="{{ $suratDokbast->tanggal_diperoleh }}"/>
                        </div>
                      </div>
                      {{-- <div class="row">
                        <div class="col-lg-12">
                          <div class="form-group">
                            <label>Lampiran</label>
                          </div>
                          <div class="row">
                              <img src="{{ url('/data_file/'.$p->file) }}">
                          </div>  
                        </div>
                      </div> --}}
                    </div>
                  </div>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <a class="btn col-lg-2 btn-secondary" href="{{ url()->previous() }}">Back</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layout.footer')
  </body>
</html>
