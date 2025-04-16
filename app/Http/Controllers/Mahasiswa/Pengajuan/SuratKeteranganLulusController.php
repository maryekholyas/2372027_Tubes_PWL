<?php

namespace App\Http\Controllers\Mahasiswa\Pengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\SuratKeteranganLulus;

class SuratKeteranganLulusController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'jenis_surat' => 'required|in:1',
            'tanggal_kelulusan' => 'required|date'
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();
            
            // Buat pengajuan otomatis (tanpa generate ID)
            $pengajuan = Pengajuan::create([
                'mahasiswa_id_mahasiswa' => $user->mahasiswa->id_mahasiswa,
                'jenis_surat' => 1,
                'tanggal_pengajuan' => now(),
                'status' => 'menunggu'
            ]);

          
            // Simpan surat keterangan lulus dengan pengajuan_id yang baru dibuat
            SuratKeteranganLulus::create([
                'pengajuan_id' => $pengajuan->pengajuan_id, // Pastikan ini sudah diisi
                'tanggal_kelulusan' => $request->tanggal_kelulusan
            ]);

            DB::commit();
            return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengajuan berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Debugging: Tampilkan error jika ada
            dd('Error during submission:', $e->getMessage()); // Memeriksa error message
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
