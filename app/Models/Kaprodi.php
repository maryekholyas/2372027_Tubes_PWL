<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kaprodi extends Model
{
    use HasFactory;

    protected $table = 'kaprodi';
    protected $primaryKey = 'id_kaprodi';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id_kaprodi',
        'program_studi_program_studi_id',
        'user_id_user',
    ];

    public function prodi()
    {
        return $this->hasOne(ProgramStudi::class, 'program_studi_id', 'program_studi_program_studi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id_user', 'id_user');
    }
}
