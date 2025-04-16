<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengajuan;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{public function index()
    {
        $user = Auth::user();
        $mahasiswa = $user->mahasiswa;
    
        if (!$mahasiswa) {
            return view('mahasiswa.dashboard')
                ->with('message', 'Data mahasiswa belum diisi. Silakan hubungi admin.')
                ->with('waiting', collect())
                ->with('approved', collect())
                ->with('rejected', collect());
        }
    
        $mahasiswaId = $mahasiswa->id_mahasiswa;
    
        $waiting = Pengajuan::with('jenisSurat')
            ->where('mahasiswa_id_mahasiswa', $mahasiswaId)
            ->where('status', 'menunggu')
            ->get();
    
        $approved = Pengajuan::with('jenisSurat')
            ->where('mahasiswa_id_mahasiswa', $mahasiswaId)
            ->where('status', 'disetujui')
            ->get();
    
        $rejected = Pengajuan::with('jenisSurat')
            ->where('mahasiswa_id_mahasiswa', $mahasiswaId)
            ->where('status', 'ditolak')
            ->get();
    
        return view('mahasiswa.dashboard', compact('waiting', 'approved', 'rejected'));
    }
    
}
