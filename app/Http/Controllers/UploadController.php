<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Gambar;
use App\Models\surat_dokbast;
use App\Models\surat_hdr;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UploadController extends Controller
{
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
            $gambar = Gambar::get();
            $employee = employee::get();
            $surat = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->where('surat_hdrs.status', 'SEND')
                ->orWhere(DB::raw("'$user->posisi'"), '=', 'Assets')
                ->where('surat_dokbasts.send_to', $user->name)
                // ->whereNotNull('surat_dokbasts.send_to')
                ->get(
                    'surat_hdrs.ticketNo as ticket'
                );
            return view('unggah/unggah', [
                'user' => $user,
                'gambar' => $gambar,
                'employee' => $employee,
                'surat' => $surat
            ]);
        }
        return redirect('/login');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
            // 'keterangan' => 'required',
        ]);
        $file = $request->file('file');
        $nama_file = time() . "_" . $file->getClientOriginalName();

        $tujuan_upload = 'data_file';
        $file->move($tujuan_upload, $nama_file);

        Gambar::create([
            'file' => $nama_file,
        ]);

        $lastGambarId = Gambar::latest('id')->value('id');

        DB::table('surat_hdrs')->insert([
            'ticketNo' => $request->noDokumen,
            'tglSurat' => date("Y-m-d H:i:s"),
            'prihal' => $request->prihal,
            'status' => 'OUT',
            'gambar_id' => $lastGambarId,
        ]);

        $lastId = surat_hdr::latest('id')->value('id');

        DB::table('surat_dokbasts')->insert([
            'tanggal_diperoleh' => $request->tanggalDokumen,
            'pengirim' => $request->pengirim,
            'lokasi' => $request->lokasi,
            'surat_hdr_id' => $lastId,
        ]);

        Alert::success('Success!', 'Data Berhasil Di Upload');
        return redirect('upload');
    }
}
