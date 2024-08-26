<?php

namespace App\Http\Controllers;

use App\Models\employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class KelolaDokumenController extends Controller
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
            $kelolaDokumen = DB::table('surat_hdrs')->where('status', 'NEW')->count();
            $suratMasuk = DB::table('surat_hdrs')->where('status', 'SEND')->count();
            $suratKeluar = DB::table('surat_hdrs')->where('status', 'OUT')->count();
            session()->put('kelolaDokumen', $kelolaDokumen);
            session()->put('suratMasuk', $suratMasuk);
            session()->put('suratKeluar', $suratKeluar);
            session()->forget('nipS');
            session()->forget('nipP');
            // echo $user;
            $surat = //DB::table('surat_hdrs')->get();
                DB::table('surat_hdrs')
                ->join('surat_dokbasts', 'surat_hdrs.id', '=', 'surat_dokbasts.surat_hdr_id')
                ->where('surat_hdrs.status', 'NEW')
                ->select('surat_hdrs.*')
                ->get();
            $employee = DB::table('users as a')
                ->join('employees as b', 'a.id_employee', '=', 'b.id')
                ->where('posisi', 'Kepala Bidang')
                ->where('status', 'Y')
                ->get();
            $title = 'Delete Data!';
            $text = "Are you sure you want to delete?";
            confirmDelete($title, $text);
            return view('kelola_dokumen/kelolaDokumen', ['surat' => $surat, 'user' => $user, 'employee' => $employee]);
        }
        return redirect('/login');
    }

    public function kelolaKaryawan()
    {
        $user = Auth::user();
        $emp = DB::table('users as a')
            ->join('employees as b', 'b.id', '=', 'a.id_employee')
            ->get();
        return view('kelola_karyawan/kelola_karyawan', ['user' => $user, 'emp' => $emp]);
    }

    public function editKelolaKaryawan($id)
    {
        $user = Auth::user();
        $emp = DB::table('users as a')
            ->join('employees as b', 'b.id', '=', 'a.id_employee')
            ->where('a.id', $id)
            ->get();
        return view('kelola_karyawan/editKelolaKaryawan', ['user' => $user, 'emp' => $emp]);
    }

    public function delete($id)
    {
        $user = Auth::user();
        if ($user  != null) {
            DB::table('users')->where('employee_id', $id)->delete();
            DB::table('employees')->where('id', $id)->delete();
            Alert::success('Success!', 'Data Berhasil Di Hapus');
            return redirect('/kelolaKaryawan');
        }
        return redirect('/login');
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        if ($user  != null) {
            // dd($request);
            DB::table('users')->where('id', $request->id)->update([
                'status' => $request->status,
                'posisi' => $request->posisi
            ]);
            Alert::success('Success!', 'Data Berhasil Di Kirim');
            return redirect('/kelolaKaryawan');
        }
        return redirect('/login');
    }
}
