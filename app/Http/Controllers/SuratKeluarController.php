<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\DB;

class SuratKeluarController extends Controller
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
            $posisi = $user->posisi;
            // echo $user;
            // $surat = DB::table('surat_hdrs')->get();
            $posts = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->leftJoin('gambar as c', 'c.id', '=', 'surat_hdrs.gambar_id')
                ->where('surat_hdrs.status', 'OUT')
                ->orWhere(DB::raw("'$posisi'"), '=', 'Assets')
                ->where('surat_dokbasts.send_to', $user->name)
                // ->whereNotNull('surat_dokbasts.send_to')
                ->get();
            // dd($posts);
            return view('surat_keluar/suratKeluar', ['user' => $user, 'surat_dokbasts' => $posts]);
        }
        return redirect('/login');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            $suratDokbast = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->leftjoin('employees as a', 'a.id', '=', 'surat_dokbasts.id_pihak_penerima')
                ->leftjoin('employees as b', 'b.id', '=', 'surat_dokbasts.id_pihak_penyerah')
                ->leftJoin('gambar as c', 'c.id', '=', 'surat_hdrs.gambar_id')
                ->where('surat_hdrs.id', $id)
                ->select('surat_hdrs.*', 'surat_dokbasts.*', 'a.nama as namaPenerima', 'b.nama as namaPenyerah', 'c.*')
                ->get();
            return view('surat_keluar/viewSuratKeluar', ['user' => $user, 'suratDokbast' => $suratDokbast]);
        }
        return redirect('/login');
    }

    public function download($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            // dd($id);
            $posts = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->join('surat_hdrs as c', 'c.ticketNo', '=', 'surat_hdrs.ticketNo')
                ->join('surat_dokbasts as d', 'd.surat_hdr_id', '=', 'c.id')
                ->join('employees as a', 'a.id', '=', 'd.id_pihak_penerima')
                ->join('employees as b', 'b.id', '=', 'd.id_pihak_penyerah')
                ->where('surat_hdrs.id', $id)
                ->select(
                    'surat_hdrs.*',
                    'surat_dokbasts.*',
                    'a.nip as nip1',
                    'a.nama as nama1',
                    'b.nip as nip2',
                    'b.nama as nama2'
                )
                ->first();
            // dd($posts);
            // return view('surat_keluar/downloadPDF', ['user' => $user, 'suratDokbast' => $posts]);
            $pdf = FacadePdf::loadView('surat_keluar/downloadPDF', ['suratDokbast' => $posts])->setPaper('a4', 'portrait');
            // $pdf = DomPDFPDF::loadView('nama_view');
            return $pdf->download('laporan-test-pdf.pdf');
        }
        return redirect('/login');
    }
}
