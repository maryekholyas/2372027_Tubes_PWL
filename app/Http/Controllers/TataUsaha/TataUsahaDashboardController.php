<?php

namespace App\Http\Controllers\TataUsaha;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TataUsahaDashboardController extends Controller
{
    public function index()
    {
        // Semua user
        $users = User::all();

        // Semua surat yang disetujui
        $approvedSurat = Pengajuan::with(['mahasiswa', 'jenisSurat'])
            ->where('status', 'disetujui')
            ->orderBy('tanggal_pengajuan', 'desc')
            ->get();

        return view('tatausaha.dashboard', compact('users', 'approvedSurat'));
    }

    

    /**
     * Upload file surat yang sudah disetujui
     */
    public function uploadSurat(Request $request, $pengajuan_id)
    {
        $request->validate([
            'file_surat' => 'required|mimes:pdf|max:2048', // max 2MB
        ]);
    
        $pengajuan = Pengajuan::findOrFail($pengajuan_id);
    
        $file = $request->file('file_surat');
    
        // Ambil nama asli file (tanpa ekstensi dan ekstensi)
        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $extension = $file->getClientOriginalExtension();
        $timestamp = now()->format('Y_m_d_H_i');
    
        // Buat nama file baru supaya unik tapi tetap terbaca
        $filename = $originalName . '_' . $timestamp . '.' . $extension;
    
        // Simpan file ke storage/app/public/surat_disetujui/ dengan nama tersebut
        $path = $file->storeAs('surat_disetujui', $filename, 'public');
    
        // Simpan path ke DB
        $pengajuan->file_surat = $path;
        $pengajuan->save();
    
        return redirect()->back()->with('success', 'Surat berhasil diunggah.');
    }
    
}
