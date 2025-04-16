<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    use HasFactory;

    protected $table = 'program_studi';
    protected $primaryKey = 'program_studi_id';
    public $incrementing = false;
    protected $keyType = 'string';

    // Karena sudah ada created_at dan updated_at
    public $timestamps = true;

    protected $fillable = [
        'program_studi_id',
        'nama_program_studi',
    ];

    /**
     * Relasi ke Mahasiswa
     */
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_program_studi_id', 'program_studi_id');
    }
}
