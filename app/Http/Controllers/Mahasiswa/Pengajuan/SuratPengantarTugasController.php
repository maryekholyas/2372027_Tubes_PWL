<?php

namespace App\Http\Controllers\Mahasiswa\Pengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\SuratPengantarTugas;

class SuratPengantarTugasController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nama_tujuan' => 'required|string|max:100',
            'nama_perusahaan_tujuan' => 'required|string|max:100',
            'alamat_perusahaan_tujuan' => 'required|string|max:255',
            'kode_mata_kuliah' => 'required|string|max:50',
            'semester_tahun' => 'required|string|max:20',
            'tujuan' => 'required|string|max:100',
            'topik' => 'required|string|max:100'
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();

            $pengajuan = Pengajuan::create([
                'mahasiswa_id_mahasiswa' => $user->mahasiswa->id_mahasiswa,
                'jenis_surat' => 4,
                'tanggal_pengajuan' => now(),
                'status' => 'menunggu'
            ]);

            SuratPengantarTugas::create([
                'pengajuan_id' => $pengajuan->pengajuan_id,
                'nama_tujuan' => $request->nama_tujuan,
                'nama_perusahaan_tujuan' => $request->nama_perusahaan_tujuan,
                'alamat_perusahaan_tujuan' => $request->alamat_perusahaan_tujuan,
                'kode_mata_kuliah' => $request->kode_mata_kuliah,
                'semester_tahun' => $request->semester_tahun,
                'tujuan' => $request->tujuan,
                'topik' => $request->topik,
                'jenis_surat' => 4
            ]);

            DB::commit();
            return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengajuan berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
