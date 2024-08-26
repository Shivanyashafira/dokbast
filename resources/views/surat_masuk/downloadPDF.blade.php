<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @foreach($suratDokbast as $p)
      @csrf
      <center>
          <p><h4>BERITA ACARA SERAH TERIMA (BAST) BMD</h4></p><p>Nomor {{$p->ticketNo}}</p>
      </center>
      <p>
          Pada hari ini Rabu tanggal empat bulan Oktober tahun dua ribu dua puluh tiga bertempat di Bandung, yang bertanda tangan di bawah ini:
      </p>
      <table width = 100%>
          <tr>
              <td width =15%>II.</td>
              <td width =15%>Nama</td>
              <td width ="10%">:</td>
              <td>{{$p->nama1}}</td>
          </tr>
          <tr>
              <td></td>
              <td>NIP</td>
              <td>:</td>
              <td>{{$p->nip1}}</td>
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
              <td>{{$p->nama2}}</td>
          </tr>
          <tr>
              <td></td>
              <td>NIP</td>
              <td>:</td>
              <td>{{$p->nip2}}</td>
          </tr>
      </table>
      <p>Selanjutnya, disebut sebagai PIHAK KEDUA.</p>
      <p>PIHAK KESATU telah menyerahkan kepada PIHAK KEDUA dengan rincian BMD sebagaimana dalam Lampiran BAST ini dan merupakan bagian yang tidak dapat dipisahkan.</p>
      <center>Pasal 1</center>
      <p>Sejak BAST ini ditandatangani, maka PIHAK KEDUA bertanggung jawab atas BMD yang telah diserahkan, sesuai dengan ketentuan peraturan perundang-undangan di bidang pengelolaan BMD.</p>
      <center>Pasal 2</center>
      <p>PIHAK KEDUA berkewajiban untuk memelihara dan menjaga BMD yang telah diserahkan agar tetap sesuai dengan spesifikasi, kondisi, dan jumlah yang diterima. Apabila dikemudian hari PIHAK KEDUA dialihtugaskan, mutasi, dan/ atau pensiun maka diwajibkan untuk segera melapor dan mengembalikan BMD tersebut kepada Pengguna Barang melalui Pengurus Barang Pengguna/ Pembantu dalam kondisi baik sesuai pada saat BAST ini ditandatangani. Dalam hal BMD tersebut mengalami kerusakan yang tidak wajar/ kehilangan karena kelalaian pemakaian, maka PIHAK KEDUA bersedia untuk melunasi ganti rugi sesuai peraturan perundang-undangan yang berlaku.</p>
      <p>Demikian BAST ini dibuat dan di tandatangani bersama</p>

      <table width = 100% align="center">
          <tr align="center">
              <td>PIHAK KEDUA,</td>
              <td>PIHAK PERTAMA,</td>
          </tr>
          <tr>
              <td height = 100px></td>
          </tr>
      </table>
    @endforeach
</body>
</html>