<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganMahasiswaAktif extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_mahasiswa_aktif';
    protected $primaryKey = 'pengajuan_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nrp',
        'semester',
        'alamat',
        'keperluan_pengajuan'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }
}