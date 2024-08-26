<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class surat_hdr extends Model
{
    protected $table = "surat_hdrs";
    protected $primaryKey = "id";
    protected $fillabe = [
        'id', 'ticketNo', 'tglSurat', 'prihal', 'status', 'gambar_id'
    ];
}
