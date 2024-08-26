<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DaftarBASTController extends Controller
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
            $suratMasuk = DB::table('surat_hdrs')->count();
            return view('daftar_BAST/daftarBast', ['suratMasuk' => $suratMasuk, 'user' => $user]);
        }
        return redirect('/login');
    }
}
