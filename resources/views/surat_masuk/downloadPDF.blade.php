<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
      <center>
          <p><h4>BERITA ACARA SERAH TERIMA (BAST) BMD</h4></p><p>Nomor {{$suratDokbast->ticketNo}}</p>
      </center>
      <p>
          Pada hari ini {{ $formattedDate }} di Bandung, yang bertanda tangan di bawah ini:
      </p>
      <table width = 100%>
          <tr>
              <td width =15%>I.</td>
              <td width =15%>Nama</td>
              <td width ="10%">:</td>
              <td>{{$suratDokbast->nama1}}</td>
          </tr>
          <tr>
              <td></td>
              <td>NIP</td>
              <td>:</td>
              <td>{{$suratDokbast->nip1}}</td>
          </tr>
      </table>
      <p>
          Selanjutnya, disebut sebagai PIHAK KESATU.
      </p>
      <table width = 100%>
          <tr>
              <td width =15%>II.</td>
              <td width =15%>Nama</td>
              <td width ="10%">:</td>
              <td>{{$suratDokbast->nama2}}</td>
          </tr>
          <tr>
              <td></td>
              <td>NIP</td>
              <td>:</td>
              <td>{{$suratDokbast->nip2}}</td>
          </tr>
      </table>
      <p>Selanjutnya, disebut sebagai PIHAK KEDUA.</p>
      <p>PIHAK KESATU telah menyerahkan kepada PIHAK KEDUA dengan rincian BMD sebagaimana dalam Lampiran BAST ini dan merupakan bagian yang tidak dapat dipisahkan.</p>
      <center>Pasal 1</center>
      <p>Sejak BAST ini ditandatangani, maka PIHAK KEDUA bertanggung jawab atas BMD yang telah diserahkan, sesuai dengan ketentuan peraturan perundang-undangan di bidang pengelolaan BMD.</p>
      <center>Pasal 2</center>
      <p>PIHAK KEDUA berkewajiban untuk memelihara dan menjaga BMD yang telah diserahkan agar tetap sesuai dengan spesifikasi, kondisi, dan jumlah yang diterima. Apabila dikemudian hari PIHAK KEDUA dialihtugaskan, mutasi, dan/ atau pensiun maka diwajibkan untuk segera melapor dan mengembalikan BMD tersebut kepada Pengguna Barang melalui Pengurus Barang Pengguna/ Pembantu dalam kondisi baik sesuai pada saat BAST ini ditandatangani. Dalam hal BMD tersebut mengalami kerusakan yang tidak wajar/ kehilangan karena kelalaian pemakaian, maka PIHAK KEDUA bersedia untuk melunasi ganti rugi sesuai peraturan perundang-undangan yang berlaku.</p>
      <p>Demikian BAST ini dibuat dan di tandatangani bersama</p>

      <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse; width: 100%;">
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Spesifikasi Barang</th>
                <th>Jumlah Barang</th>
                <th>Tanggal Perolehan</th>
            </tr>
            <tr>
                <td>1</td>
                <td>{{$suratDokbast->kode_barang}}</td>
                <td>{{$suratDokbast->nama_barang}}</td>
                <td>{{$suratDokbast->spesifikasi_barang}}</td>
                <td>{{$suratDokbast->jumlah_barang}} {{$suratDokbast->satuan_barang}}</td>
                <td>{{$suratDokbast->tanggal_diperoleh}}</td>
            </tr>
        </table>
      <br>
      <table width = 100% align="center">
          <tr align="center">
              <td>PIHAK KEDUA,</td>
              <td>PIHAK PERTAMA,</td>
          </tr>
          <tr>
              <td height = 100px></td>
          </tr>
      </table>
</body>
</html>