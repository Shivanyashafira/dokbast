<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Carbon\Carbon;

class SuratMasukController extends Controller
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
            $suratMasuk = DB::table('surat_hdrs')
                // ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->where('surat_hdrs.status', 'SEND')
                // ->select('surat_hdrs.*', 'surat_dokbasts.*')
                ->get();
            return view('surat_masuk/suratMasuk', ['surat' => $suratMasuk, 'user' => $user]);
        }
        return redirect('/login');
    }

    public function view($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            $surat_dokbats = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->join('surat_hdrs as a', 'a.ticketNo', '=', 'surat_hdrs.ticketNo')
                ->join('surat_dokbasts as b', 'b.surat_hdr_id', '=', 'a.id')
                ->leftJoin('gambar as c', 'c.id', '=', 'surat_hdrs.gambar_id')
                ->where('surat_hdrs.id', $id)
                ->first();
            return view('surat_masuk/viewSuratMasuk', [
                'user' => $user, 'suratDokbast' => $surat_dokbats
            ]);
        }
        return redirect('/login');
    }

    public function download($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            $posts = DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->join('employees as a', 'a.id', '=', 'surat_dokbasts.id_pihak_penerima')
                ->join('employees as b', 'b.id', '=', 'surat_dokbasts.id_pihak_penyerah')
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
            $formattedDate = Carbon::parse($posts->tanggal_diperoleh)->locale('id')->isoFormat('dddd, D MMMM YYYY');
            $pdf = FacadePdf::loadView('surat_masuk/downloadPDF', ['suratDokbast' => $posts, 'formattedDate' => $formattedDate])->setPaper('a4', 'portrait');
            // $pdf = DomPDFPDF::loadView('nama_view');
            return $pdf->download('laporan-test-pdf.pdf');
        }
        return redirect('/login');
    }
}
