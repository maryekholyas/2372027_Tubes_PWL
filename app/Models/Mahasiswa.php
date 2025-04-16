<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Ubah sesuai dengan nama tabel yang ada, misalnya "mahasiswa"
    protected $table = 'mahasiswa';

    // Sesuaikan primary key jika diperlukan
    protected $primaryKey = 'id_mahasiswa';  // atau sesuai dengan definisi Anda

    public $incrementing = false;
    protected $keyType = 'string';

    public $timestamps = true;

    protected $fillable = [
        'id_mahasiswa',
        'user_id_user',
        'program_studi_program_studi_id',
        'alamat',       // Pastikan kolom baru sudah ada di tabel!
        'semester',     // Pastikan kolom baru sudah ada di tabel!
    ];

    // Relasi ke tabel User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }

    // Relasi ke tabel Program Studi
    public function programStudi()
    {
        return $this->belongsTo(ProgramStudi::class, 'program_studi_program_studi_id', 'program_studi_id');
    }

    // Relasi ke tabel Pengajuan
    public function pengajuan()
    {
        return $this->hasMany(Pengajuan::class, 'mahasiswa_id_mahasiswa', 'id_mahasiswa');
    }
}
