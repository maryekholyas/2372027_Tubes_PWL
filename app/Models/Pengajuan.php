<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    // Nama tabel sesuai skema
    protected $table = 'pengajuan_surat';

    // Primary key saat ini adalah 'pengajuan_id'
    protected $primaryKey = 'pengajuan_id';

    // Jadikan auto increment
    public $incrementing = true;

    // Karena auto increment, tipe kunci adalah integer
    protected $keyType = 'int';

    // Gunakan timestamps Laravel (created_at, updated_at)
    public $timestamps = true;

    // Kolom‑kolom yang boleh di‑mass assign
    // Tidak memasukkan pengajuan_id karena auto increment
    protected $fillable = [
        'status',
        'tanggal_pengajuan',
        'jenis_surat',
        'mahasiswa_id_mahasiswa',
        'file_surat',
        'user_id',       // jika memang ada di tabel
        'id_jenis_surat' // jika digunakan, sesuaikan dengan kolom di DB
    ];
    
    /**
     * Relasi ke Mahasiswa.
     * FK: mahasiswa_id_mahasiswa → mahasiswa.id_mahasiswa
     */
    public function mahasiswa()
    {
        return $this->belongsTo(
            Mahasiswa::class,
            'mahasiswa_id_mahasiswa',
            'id_mahasiswa'
        );
    }

    /**
     * Relasi ke JenisSurat.
     * FK: jenis_surat → jenis_surat.id_jenis_surat
     */
    public function jenisSurat()
    {
        return $this->belongsTo(
            JenisSurat::class,
            'jenis_surat',
            'id_jenis_surat'
        );
    }


public function detail()
{
    switch ($this->jenis_surat) {
        case 'surat_keterangan_lulus':
            return $this->hasOne(\App\Models\SuratKeteranganLulus::class, 'pengajuan_id', 'pengajuan_id');
        case 'surat_keterangan_mahasiswa_aktif':
            return $this->hasOne(\App\Models\SuratKeteranganMahasiswaAktif::class, 'pengajuan_id', 'pengajuan_id');
        case 'surat_laporan_hasil_studi':
            return $this->hasOne(\App\Models\SuratLaporanHasilStudi::class, 'pengajuan_id', 'pengajuan_id');
        case 'surat_pengantar_tugas':
            return $this->hasOne(\App\Models\SuratPengantarTugas::class, 'pengajuan_id', 'pengajuan_id');
        default:
            return null;
    }
}


}
