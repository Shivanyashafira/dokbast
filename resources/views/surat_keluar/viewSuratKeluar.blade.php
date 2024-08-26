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
              <li class="separator">
                <i class="icon-arrow-right"></i>
              </li>
              <li class="nav-item">
                <a href="#">Detail Surat Keluar</a>
              </li>
            </ul>
          </div>

          <div class="row">
            <div class="col-md-12">
              @foreach($suratDokbast as $p)
                @csrf
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Detail Surat Keluar</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>No Dokumen</label>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        <input type="text" class="form-control" placeholder="No Dokumen" readonly value="{{$p->ticketNo}}" name="noDokumen" />
                      </div>
                      <div class="col-lg-5">
                        <input type="date" class="form-control" readonly value="{{\Carbon\Carbon::parse($p->tglSurat)->format('Y-m-d')}}" name="tanggalDokumen" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>Pengirim</label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="Pengirim" readonly value="{{$p->pengirim}}" name="pengirim" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>Perihal</label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="Perihal" value="{{$p->prihal}}" readonly name="perihal" />
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
              @endforeach
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
  </div>
  @include('layout.footer')
</body>

</html>