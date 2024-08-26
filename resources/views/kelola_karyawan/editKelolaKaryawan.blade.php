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
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Edit Karyawan</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                {{-- @foreach($surat as $p) --}}
                {{-- @foreach($suratDokbast as $p)
                <form action="{{route('updateDokumen/update')}}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                          <input type="hidden" name="id" value="{{ $p->id }}"> <br/>
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
                              <input type="text" class="form-control" placeholder="Kode Barang" name="kodeBarang" required value="{{ $p->kode_barang }}"/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Nama Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Nama Barang" name="namaBarang" required value="{{ $p->nama_barang }}"/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Spesifikasi Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-8">
                              <input type="text" class="form-control" placeholder="Spesifikasi Barang" name="spesifikasiBarang" required value="{{ $p->spesifikasi_barang }}"/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Jumlah Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="number" class="form-control" placeholder="Jumlah Barang" name="jumlahBarang" required value="{{ $p->jumlah_barang }}"/>
                            </div>
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Satuan Barang</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="text" class="form-control" placeholder="Satuan Barang" name="satuanBarang" required value="{{ $p->satuan_barang }}"/>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-lg-2">
                              <div class="form-group">
                                <label>Tanggal Diperoleh</label>
                                </div>
                            </div>
                            <div class="col-lg-3">
                              <input type="date" class="form-control" placeholder="Tanggal Diperoleh" name="tanggalDiperoleh" required value="{{ $p->tanggal_diperoleh }}"/>
                            </div>
                          </div>
                        </div>
                        
                        <div class="card-action">
                          <button class="btn btn-success">Submit</button>
                          <button type="button" onclick="window.location.href='{{ route('kelolaDokumen/index') }}'" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </form>
                @endforeach --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @include('layout.footer')
  </body>
</html>
