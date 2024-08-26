<?php

namespace App\Http\Controllers;

use App\Models\surat_hdr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AddDokumenController extends Controller
{
    public $NIK = 'test';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        if ($user  != null) {
            // echo $user;
            return view('kelola_dokumen/addDokumen', ['user' => $user]);
        }
        return redirect('/login');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastId = surat_hdr::latest('id')->value('id');
        $nextId = $lastId ? $lastId + 1 : 1;
        $tahun = date("Y");
        $noDokumen = "$nextId/BAST/$tahun";
        DB::table('surat_hdrs')->insert([
            'ticketNo' => $noDokumen,
            'tglSurat' => date("Y-m-d H:i:s"),
            'prihal' => '',
            'status' => 'NEW',
            'gambar_id' => 0,
        ]);

        // dd($request->all());
        DB::table('surat_dokbasts')->insert([
            'kode_barang' => $request->kodeBarang,
            'nama_barang' => $request->namaBarang,
            'spesifikasi_barang' => $request->spesifikasiBarang,
            'jumlah_barang' => $request->jumlahBarang,
            'satuan_barang' => $request->satuanBarang,
            'tanggal_diperoleh' => $request->tanggalDiperoleh,
            'id_pihak_penyerah' => $request->idPihakPenyerah,
            'id_pihak_penerima' => $request->idPihakPenerima,
            'surat_hdr_id' => $nextId,
        ]);
        Alert::success('Success!', 'Data Berhasil Di Masukan');
        return redirect('/kelolaDokumen');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            $surat = DB::table('surat_hdrs')->where('id', $id)->get();
            $surat_dokbats = DB::table('surat_dokbasts')->where('surat_hdr_id', $id)->get();
            // echo $surat;
            return view('kelola_dokumen/editDokumen', ['surat' => $surat, 'user' => $user, 'suratDokbast' => $surat_dokbats]);
        }
        return redirect('/login');
    }

    public function delete($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            DB::table('surat_hdrs')->where('id', $id)->delete();
            DB::table('surat_dokbasts')->where('surat_hdr_id', $id)->delete();
            Alert::success('Success!', 'Data Berhasil Di Hapus');
            return redirect('/kelolaDokumen');
        }
        return redirect('/login');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user  != null) {
            // DB::table('surat_hdrs')->where('id', $request->id)->update([
            //     'prihal' => '$request->nama',
            // ]);

            DB::table('surat_dokbasts')->where('id', $request->id)->update([
                'kode_barang' => $request->kodeBarang,
                'nama_barang' => $request->namaBarang,
                'spesifikasi_barang' => $request->spesifikasiBarang,
                'jumlah_barang' => $request->jumlahBarang,
                'satuan_barang' => $request->satuanBarang,
                'tanggal_diperoleh' => $request->tanggalDiperoleh,
            ]);

            Alert::success('Success!', 'Data Berhasil Di Update');
            return redirect('/kelolaDokumen');
        }
        return redirect('/login');
    }

    public function search(Request $request)
    {
        $idS = $request->nipS;
        $idP = $request->nipP;
        $user = Auth::user();
        if ($user  != null) {
            $nipS = DB::table('employees')->where('nip', $idS)->first();
            $nipP = DB::table('employees')->where('nip', $idP)->first();

            $request->session()->put('nipS', $nipS);
            $request->session()->put('nipP', $nipP);
            $data = $request->session()->all();

            return view('kelola_dokumen/addDokumen', ['user' => $user, 'data' => $data]);
        }
        return redirect('/login');
    }

    public function send(Request $request)
    {
        $user = Auth::user();
        if ($user  != null) {
            // dd($request);
            DB::table('surat_hdrs')->where('id', $request->id)->update([
                'status' => 'SEND',
            ]);
            DB::table('surat_dokbasts')->where('surat_hdr_id', $request->id)->update([
                'send_to' => $request->sendTo,
            ]);
            Alert::success('Success!', 'Data Berhasil Di Kirim');
            return redirect('/kelolaDokumen');
        }
        return redirect('/login');
    }
}
