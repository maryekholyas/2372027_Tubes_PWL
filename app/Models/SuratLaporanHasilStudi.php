<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratLaporanHasilStudi extends Model
{
    use HasFactory;

    protected $table = 'surat_laporan_hasil_studi';
    protected $primaryKey = 'pengajuan_id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'pengajuan_id',
        'nama',
        'nrp',
        'keperluan_pembuatan_lhs'
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }
}