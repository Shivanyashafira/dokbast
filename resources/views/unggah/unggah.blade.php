<!DOCTYPE html>
<html lang="en">

<head>
  @include('layout.head')
  <style type="text/css">
    .drop-container {
      position: relative;
      display: flex;
      gap: 10px;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      height: 200px;
      padding: 20px;
      border-radius: 10px;
      border: 2px dashed #555;
      color: #444;
      cursor: pointer;
      transition: background .2s ease-in-out, border .2s ease-in-out;
    }

    .drop-container:hover {
      background: #eee;
      border-color: #111;
    }

    .drop-container:hover .drop-title {
      color: #222;
    }

    .drop-title {
      color: #444;
      font-size: 20px;
      font-weight: bold;
      text-align: center;
      transition: color .2s ease-in-out;
    }

    .drop-container.drag-active {
      background: #eee;
      border-color: #111;
    }

    .drop-container.drag-active .drop-title {
      color: #222;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    @include('layout/menu')

    <div class="main-panel">
      @include('layout.navbar')

      <div class="container">
        <div class="page-inner">
          <div class="page-header">
            <h3 class="fw-bold mb-3">Unggah</h3>
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
                <a href="#">Unggah</a>
              </li>
            </ul>
          </div>

          <div class="row">
            <div class="col-md-12">
              <form action="{{ route('prosesUpload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card">
                  <div class="card-header">
                    <div class="card-title">Unggah</div>
                  </div>
                  <div class="card-body">
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>No Dokumen</label>
                        </div>
                      </div>
                      <div class="col-lg-5">
                        {{-- <input type="text" class="form-control" placeholder="No Dokumen"  name="noDokumen" /> --}}
                        <select class="form-control" id="position-option" required name="noDokumen">
                          <option value="" disabled selected>PILIH TIKET</option>
                          @foreach ($surat as $e)
                            <option value="{{ $e->ticket }}">{{ $e->ticket }}</option>
                          @endforeach
                      </select>
                      </div>
                      <div class="col-lg-5">
                        <input type="date" class="form-control" name="tanggalDokumen" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>Pengirim</label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="Pengirim"  name="pengirim" />
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>Lokasi</label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <select
                            class="form-select form-control-lg"
                            id="largeSelect"
                            name="lokasi"
                          >
                            <option value="1"> Infrastruktur dan Kewilayahan</option>
                            <option value="2"> Perekomonian dan Sumber Daya Alam</option>
                            <option value="3"> Tata Usaha</option>
                            <option value="4"> Sekretariat</option>
                            <option value="5"> Perencanaan, Pengendalian dan Evaluasi Pembangunan</option>
                            <option value="6"> Pemerintahan dan Pembangunan Manusia</option>
                          </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-lg-2">
                        <div class="form-group">
                          <label>Perihal</label>
                        </div>
                      </div>
                      <div class="col-lg-10">
                        <input type="text" class="form-control" placeholder="Perihal"  name="prihal" />
                      </div>
                    </div>
                    <div class="col-lg-2">
                      <div class="form-group">
                        <label>Lampiran</label>
                      </div>
                    </div>
                    <label for="images" class="drop-container" id="dropcontainer">
                      <span class="drop-title">Drop files here</span>
                      or
                      <input type="file" name="file" id="images" accept="image/*" >
                    </label>
                    {{-- <input type="file" name="file">
        <button type="submit">Upload</button> --}}
                    <div class="row">
                      <div class="card-action">
                        <button type="submit" class="btn col-lg-12 btn-success">UPLOAD</button>
                      </div>
                      {{-- @foreach($gambar as $g)
                        <img width="150px" src="{{ url('/data_file/'.$g->file) }}">
                      @endforeach --}}
                    </div>  
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
  <script>
    const dropContainer = document.getElementById("dropcontainer")
    const fileInput = document.getElementById("images")

    dropContainer.addEventListener("dragover", (e) => {
      // prevent default to allow drop
      e.preventDefault()
    }, false)

    dropContainer.addEventListener("dragenter", () => {
      dropContainer.classList.add("drag-active")
    })

    dropContainer.addEventListener("dragleave", () => {
      dropContainer.classList.remove("drag-active")
    })

    dropContainer.addEventListener("drop", (e) => {
      e.preventDefault()
      dropContainer.classList.remove("drag-active")
      fileInput.files = e.dataTransfer.files
    })
  </script>
  
  @include('sweetalert::alert')
</body>

</html>