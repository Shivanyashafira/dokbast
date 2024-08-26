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
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tambah Dokumen</a>
                </li>
              </ul>
            </div>

            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="card-header">
                          <div class="card-title">Pihak Penyerah</div>
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="card-header">
                          <div class="card-title">Pihak Penerima</div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group col-lg-6 form-group">
                        <form action="{{route('addDokumen/search')}}" method="POST">
                          @csrf
                          <div class="input-group">
                            <button class="btn btn-black btn-border" type="submit">SEARCH</button>
                            <input
                              class="form-control"
                              placeholder="NIP"
                              name="nipS"
                              @if (session('nipS'))
                                value="{{ session('nipS')->nip }}"
                              @endif
                            />
                          </div>
                      </div>
                      <div class="form-group col-lg-6 form-group">
                          <div class="input-group">
                            <button class="btn btn-black btn-border" type="submit">SEARCH</button>
                            <input
                              class="form-control"
                              placeholder="NIP"
                              name="nipP"
                              @if (session('nipP'))
                                value="{{ session('nipP')->nip }}"
                              @endif
                            />
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 form-group">
                        <input type="text" class="form-control" placeholder="Nama" name="nip"
                        @if (session('nipS'))
                          value="{{ session('nipS')->nama }}"
                        @endif
                        readonly/>
                      </div>
                      <div class="col-lg-6 form-group">
                        <input type="text" class="form-control" placeholder="Nama" name="nama1" 
                        @if (session('nipP'))
                          value="{{ session('nipP')->nama }}"
                        @endif
                        readonly/>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-6 form-group">
                        <input type="text" class="form-control" placeholder="NIK" name="nik" 
                        @if (session('nipS'))
                          value="{{ session('nipS')->nik }}"
                        @endif
                        readonly/>
                      </div>
                      <div class="col-lg-6 form-group">
                        <input type="text" class="form-control" placeholder="NIK" name="nik1" 
                        @if (session('nipP'))
                          value="{{ session('nipP')->nik }}"
                        @endif
                        readonly/>
                      </div>
                    </div>
                  </div>
              </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
                <form action="{{route('simpanDokumen/store')}}" method="POST">
                    @csrf
                      <input type="hidden" class="form-control" placeholder="NIK" name="idPihakPenyerah" 
                        @if (session('nipP'))
                          value="{{ session('nipP')->id }}"
                        @endif
                        readonly/>
                      <input type="hidden" class="form-control" placeholder="NIK" name="idPihakPenerima" 
                        @if (session('nipS'))
                          value="{{ session('nipS')->id }}"
                        @endif
                        readonly/>
                    <div class="card">
                        <div class="card-header">
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
                              <input type="text" class="form-control" placeholder="Kode Barang" name="kodeBarang" required/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Nama Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Nama Barang" name="namaBarang" required/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Spesifikasi Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Spesifikasi Barang" name="spesifikasiBarang" required/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Jumlah Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="number" class="form-control" placeholder="Jumlah Barang" name="jumlahBarang" required/>
                            </div>
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Satuan Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" placeholder="Satuan Barang" name="satuanBarang" required/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Tanggal Diperoleh</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="date" class="form-control" placeholder="Tanggal Diperoleh" name="tanggalDiperoleh" required/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="card-action">
                          <button class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layout.footer')
  </body>
</html>
