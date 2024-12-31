<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatMedis extends Model
{
    use HasFactory;

    protected $table = 'riwayatmedis';

    protected $fillable = [
        'pasien_id',
        'diagnosa',
    ];

    // Relasi ke model Pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }
}
