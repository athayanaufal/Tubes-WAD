<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawat extends Model
{
    use HasFactory;

    protected $table = 'perawat';

    protected $fillable = [
        'nama_perawat',
        'nip_perawat',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
        'spesialisasi',
    ];

    // Relasi jika perawat bekerja di kamar tertentu
    public function kamar()
    {
        return $this->belongsToMany(Kamar::class);
    }
}

