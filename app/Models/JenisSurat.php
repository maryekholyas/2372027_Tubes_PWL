<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    protected $table = 'jenis_surat';
    protected $primaryKey = 'id_jenis_surat';
    public $incrementing = true; // Ganti ke true
    protected $keyType = 'int'; // Ganti ke int

    public $timestamps = true;

    protected $fillable = [
        'nama_surat',
        'created_at',
    ];

    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'jenis_surat', 'id_jenis_surat');
    }
}
