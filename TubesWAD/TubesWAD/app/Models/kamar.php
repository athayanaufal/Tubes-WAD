<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';

    protected $fillable = [
        'nama_kamar',
        'tipe_kamar',
        'kapasitas',
        'status',
    ];

    // Relasi dengan pasien
    public function pasien()
    {
        return $this->hasMany(Pasien::class);
    }

    // Relasi dengan pegawai (opsional)
    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}

