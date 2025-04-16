<?php

namespace App\Http\Controllers\Mahasiswa\Pengajuan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pengajuan;
use App\Models\SuratLaporanHasilStudi;

class SuratLaporanHasilStudiController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'keperluan_pembuatan_lhs' => 'required|string|max:255'
        ]);

        DB::beginTransaction();
        try {
            $user = Auth::user();

            $pengajuan = Pengajuan::create([
                'mahasiswa_id_mahasiswa' => $user->mahasiswa->id_mahasiswa,
                'jenis_surat' => 3,
                'tanggal_pengajuan' => now(),
                'status' => 'menunggu'
            ]);

            SuratLaporanHasilStudi::create([
                'pengajuan_id' => $pengajuan->pengajuan_id,
                'keperluan_pembuatan_lhs' => $request->keperluan_pembuatan_lhs
            ]);

            DB::commit();
            return redirect()->route('mahasiswa.dashboard')->with('success', 'Pengajuan berhasil!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal: ' . $e->getMessage());
        }
    }
}
