<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    use HasFactory;

    protected $table = 'janji_temu';

    protected $fillable = ['dokter_id', 'nama_pasien', 'nomor_telepon_pasien', 'waktu_janji', 'catatan'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'dokter_id');
    }
}
