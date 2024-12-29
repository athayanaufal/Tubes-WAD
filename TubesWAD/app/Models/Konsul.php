<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsul extends Model
{
    use HasFactory;

    protected $table = 'konsul';

    protected $fillable = [
        'nip_dokter',
        'nama_pasien',
        'nomor_telepon_pasien',
        'waktu_janji',
        'catatan',
        'status',
    ];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'nip_dokter', 'nip_dokter');
    }
} 