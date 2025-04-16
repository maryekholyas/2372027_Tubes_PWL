<?php

namespace App\Http\Controllers\Kaprodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaprodiDashboardController extends Controller
{
    public function index()
    {
        $pengajuans = DB::table('pengajuan_surat')
            ->join('users', 'pengajuan_surat.mahasiswa_id_mahasiswa', '=', 'users.id_user')
            ->join('mahasiswa', 'pengajuan_surat.mahasiswa_id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->join('jenis_surat', 'pengajuan_surat.jenis_surat', '=', 'jenis_surat.id_jenis_surat')
            ->orderBy('tanggal_pengajuan', 'desc')
            ->select(
                'pengajuan_surat.*',
                'users.name as user_name',
                'mahasiswa.id_mahasiswa as nrp',
                'jenis_surat.nama_surat as jenis_surat_nama'
            )
            ->get()
            ->map(function ($pengajuan) {
                $detail = match ($pengajuan->jenis_surat) {
                    '1' => DB::table('surat_keterangan_lulus')->where('pengajuan_id', $pengajuan->pengajuan_id)->first(),
                    '2' => DB::table('surat_keterangan_mahasiswa_aktif')->where('pengajuan_id', $pengajuan->pengajuan_id)->first(),
                    '3' => DB::table('surat_laporan_hasil_studi')->where('pengajuan_id', $pengajuan->pengajuan_id)->first(),
                    '4' => DB::table('surat_pengantar_tugas')->where('pengajuan_id', $pengajuan->pengajuan_id)->first(),
                    default => null,
                };

                if ($detail) {
                    $detail->nama = $pengajuan->user_name;
                    $detail->nrp = $pengajuan->nrp;
                }

                $pengajuan->detail = $detail;
                return $pengajuan;
            });

        return view('kaprodi.dashboard', compact('pengajuans'));
    }

    public function show($id)
    {
        $pengajuan = DB::table('pengajuan_surat')
            ->join('users', 'pengajuan_surat.mahasiswa_id_mahasiswa', '=', 'users.id_user')
            ->join('mahasiswa', 'pengajuan_surat.mahasiswa_id_mahasiswa', '=', 'mahasiswa.id_mahasiswa')
            ->join('jenis_surat', 'pengajuan_surat.jenis_surat', '=', 'jenis_surat.id_jenis_surat')
            ->where('pengajuan_surat.pengajuan_id', $id)
            ->select(
                'pengajuan_surat.*',
                'users.name as user_name',
                'mahasiswa.id_mahasiswa as nrp',
                'jenis_surat.nama_surat as jenis_surat_nama'
            )
            ->first();

        if (!$pengajuan) {
            abort(404);
        }

        $detail = match ($pengajuan->jenis_surat) {
            '1' => DB::table('surat_keterangan_lulus')->where('pengajuan_id', $id)->first(),
            '2' => DB::table('surat_keterangan_mahasiswa_aktif')->where('pengajuan_id', $id)->first(),
            '3' => DB::table('surat_laporan_hasil_studi')->where('pengajuan_id', $id)->first(),
            '4' => DB::table('surat_pengantar_tugas')->where('pengajuan_id', $id)->first(),
            default => null,
        };

        if ($detail) {
            $detail->jenis_surat = $pengajuan->jenis_surat_nama;
            $detail->nama = $pengajuan->user_name;
            $detail->nrp = $pengajuan->nrp;
        }

        // Jika diperlukan, Anda dapat menyiapkan array mapping jenis surat untuk tampilan form detail
        $jenisSurat = [
            '1' => 'Surat Keterangan Lulus',
            '2' => 'Surat Mahasiswa Aktif',
            '3' => 'Laporan Hasil Studi',
            '4' => 'Surat Pengantar Tugas'
        ];

        return view('kaprodi.surat_detail', [
            'pengajuan' => $pengajuan,
            'detail' => $detail,
            'jenisSurat' => $jenisSurat
        ]);
    }

    public function approve(Request $request, $id)
    {
        DB::table('pengajuan_surat')
            ->where('pengajuan_id', $id)
            ->update([
                'status' => 'disetujui',
                'updated_at' => now()
            ]);

        return redirect()->route('kaprodi.dashboard')
            ->with('status', 'success')
            ->with('message', 'Pengajuan berhasil disetujui');
    }

    public function tolak(Request $request, $id)
    {
        DB::table('pengajuan_surat')
            ->where('pengajuan_id', $id)
            ->update([
                'status' => 'ditolak',
                'updated_at' => now()
            ]);

        return redirect()->route('kaprodi.dashboard')
            ->with('status', 'success')
            ->with('message', 'Pengajuan berhasil ditolak');
    }
}