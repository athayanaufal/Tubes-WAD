<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = 'pegawai';

    protected $fillable = [
        'nama_pegawai',
        'nip_pegawai',
        'jabatan',
        'alamat',
        'jenis_kelamin',
        'no_telepon',
    ];

    // Contoh relasi jika pegawai bertugas di kamar tertentu
    public function kamar()
    {
        return $this->hasMany(Kamar::class);
    }
}

