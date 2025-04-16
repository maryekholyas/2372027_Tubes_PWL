<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeteranganLulus extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_lulus';
    protected $primaryKey = 'pengajuan_id';
    public $incrementing = true; // ini jadi true
    protected $keyType = 'int'; 

    protected $fillable = [
        'pengajuan_id',
        'tanggal_kelulusan' // ← cuma ini yang tersisa
    ];

    public function pengajuan()
    {
        return $this->belongsTo(Pengajuan::class, 'pengajuan_id', 'pengajuan_id');
    }
}
