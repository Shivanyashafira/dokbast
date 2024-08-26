<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_dokbasts', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->nullable();
            $table->string('nama_barang')->nullable();
            $table->string('spesifikasi_barang')->nullable();
            $table->integer('jumlah_barang')->nullable();
            $table->string('satuan_barang')->nullable();
            $table->date('tanggal_diperoleh')->nullable();
            $table->integer('id_pihak_penyerah')->nullable();
            $table->integer('id_pihak_penerima')->nullable();
            $table->integer('surat_hdr_id')->nullable();
            $table->integer('gambar_id')->nullable();
            $table->integer('lokasi')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('send_to')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_dokbasts');
    }
};
