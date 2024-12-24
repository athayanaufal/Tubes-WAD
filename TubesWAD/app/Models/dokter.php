<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $table = 'dokter';

    protected $fillable = [
        'nama_dokter',
        'spesialisasi',
        'nip_dokter',
        'jenis_kelamin',
        'no_telepon',
    ];

    // Contoh relasi jika dokter menangani pasien tertentu
    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }
}
