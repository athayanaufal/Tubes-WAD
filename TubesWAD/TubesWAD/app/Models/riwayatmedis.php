<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class riwayatmedis extends Model
{
    use HasFactory;

    protected $fillable = [
        'pasien_id', 'dokter_id', 'diagnosis', 'obat', 'tanggal',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class);
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class);
    }
}