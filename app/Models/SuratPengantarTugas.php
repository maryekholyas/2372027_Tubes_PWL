<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPengantarTugas extends Model
{
    use HasFactory;

    protected $table = 'surat_pengantar_tugas';
    protected $primaryKey = 'pengajuan_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nrp',
        'nama_tujuan',
        'nama_perusahaan_tujuan',
        'alamat_perusahaan_tujuan',
        'kode_mata_kuliah',
        'semester_tahun',
        'tujuan',
        'topik',
        'jenis_surat'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class, 'jenis_surat', 'id_jenis_surat');
    }
}