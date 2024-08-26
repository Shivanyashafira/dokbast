<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        // dd($user);
        if ($user  != null && $user->status == 'Y') {
            // echo $user;
            $kelolaDokumen = DB::table('surat_hdrs')->where('status', 'NEW')->count();
            $suratMasuk = DB::table('surat_hdrs')->where('status', 'SEND')->count();
            $suratKeluar = DB::table('surat_hdrs')->where('status', 'OUT')->count();
            session()->put('kelolaDokumen', $kelolaDokumen);
            session()->put('suratMasuk', $suratMasuk);
            session()->put('suratKeluar', $suratKeluar);

            return view('dashboard/dashboard', [
                'kelolaDokumen' => $kelolaDokumen,
                'suratMasuk' => $suratMasuk,
                'suratKeluar' => $suratKeluar,
                'user' => $user,
            ]);
        }
        Auth::logout();
        return redirect('/login');
    }

    public function detailsTabel()
    {
        return view('tables/index');
    }
}
