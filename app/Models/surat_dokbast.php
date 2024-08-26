<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_dokbast extends Model
{
    protected $table = "surat_dokbasts";
    protected $primaryKey = "id";
    protected $fillabe = [
        'id',
        'kode_barang',
        'nama_barang',
        'spesifikasi_barang',
        'jumlah_barang',
        'satuan_barang',
        'tanggal_diperoleh',
        'id_pihak_penyerah',
        'id_pihak_penerima',
        'surat_hdr_id',
        'gambar_id',
        'lokasi',
        'pengirim',
        'send_to',
    ];
}
