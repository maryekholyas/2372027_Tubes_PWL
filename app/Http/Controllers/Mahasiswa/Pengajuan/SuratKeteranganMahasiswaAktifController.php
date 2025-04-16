<?php

namespace App\Http\Controllers\Mahasiswa\Pengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\SuratKeteranganMahasiswaAktif;

class SuratKeteranganMahasiswaAktifController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'semester' => 'required|integer',
            'alamat' => 'required|string|max:255',
            'keperluan_pengajuan' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();

            $pengajuan = Pengajuan::create([
                'mahasiswa_id_mahasiswa' => $user->mahasiswa->id_mahasiswa,
                'jenis_surat' => 2,
                'tanggal_pengajuan' => now(),
                'status' => 'menunggu'
            ]);

            SuratKeteranganMahasiswaAktif::create([
                'pengajuan_id' => $pengajuan->pengajuan_id,
                'semester' => $request->semester,
                'alamat' => $request->alamat,
                'keperluan_pengajuan' => $request->keperluan_pengajuan
            ]);

            DB::commit();
            return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengajuan berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
