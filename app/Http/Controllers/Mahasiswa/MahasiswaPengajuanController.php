<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisSurat;

class MahasiswaPengajuanController extends Controller
{
    public function index()
    {
        return view('mahasiswa.pengajuan.index'); // halaman daftar pengajuan
    }

    public function formPengajuan(Request $request)
    {
        $id_jenis_surat = $request->query('jenis_surat');
        $jenisSurat = JenisSurat::findOrFail($id_jenis_surat);

        $viewMap = [
            '1' => 'surat_keterangan_lulus',
            '2' => 'surat_keterangan_mahasiswa_aktif',
            '3' => 'surat_laporan_hasil_studi',
            '4' => 'surat_pengantar_tugas',
        ];

        if (!isset($viewMap[$id_jenis_surat])) {
            abort(404, 'Jenis surat tidak ditemukan.');
        }

        return view('mahasiswa.pengajuan.' . $viewMap[$id_jenis_surat], compact('jenisSurat'));
    }
}
