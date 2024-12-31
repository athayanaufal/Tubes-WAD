<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $table = 'pasien';

    // Field yang dapat diisi secara mass-assignment
    protected $fillable = [
        'nama_pasien',
        'nik_pasien',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'no_telepon',
    ];

    // Tambahkan relasi jika ada (contoh: pasien memiliki rawat inap)
    public function kamar()
    {
        return $this->belongsTo(Kamar::class);
    }
    public function dokter()
    {
        return $this->hasMany(Dokter::class);
    }
    public function riwayatMedis()
    {
        return $this->hasMany(RiwayatMedis::class);
    }
}

