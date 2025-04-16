<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Nama tabel terkait.
     */
    protected $table = 'users';

    /**
     * Primary key tabel.
     */
    protected $primaryKey = 'id_user';

    /**
     * ID tidak auto increment karena diisi manual.
     */
    public $incrementing = false;

    /**
     * Tipe data dari primary key.
     */
    protected $keyType = 'string';

    /**
     * Kolom yang boleh diisi massal.
     */
    protected $fillable = [
        'id_user',
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * Kolom yang disembunyikan dari array atau JSON.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting data.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Relasi ke tabel mahasiswa (jika user adalah mahasiswa).
     */
    public function mahasiswa()
    {
        return $this->hasOne(Mahasiswa::class, 'user_id_user', 'id_user');
    }

    /**
     * Relasi ke tabel kaprodi (jika user adalah kaprodi).
     */
    public function kaprodi()
    {
        return $this->hasOne(Kaprodi::class, 'user_id_user', 'id_user');
    }

    /**
     * Relasi ke tabel tata usaha (jika user adalah tata usaha).
     */
    public function tataUsaha()
    {
        return $this->hasOne(TataUsaha::class, 'user_id_user', 'id_user');
    }
}
