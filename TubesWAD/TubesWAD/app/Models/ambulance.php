<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ambulance extends Model
{
    use HasFactory;
    protected $table = 'ambulances';

    // Tentukan kolom yang dapat diisi (mass assignable)
    protected $fillable = [
        'kode_mobil',
        'nip_supir',
        'nik_pasien',
    ];

    /**
     * Relasi ke model Supir (User).
     */
    public function supir()
    {
        return $this->belongsTo(SupirAmbulan::class, 'nip_supir');
    }

    public function showAmbulances()
    {
        // Fetch ambulances along with related 'pasien' to avoid N+1 query problem
        $ambulances = Ambulance::with('pasien')->get();

        // Pass the ambulances to the Blade view
        return view('yourviewname', compact('ambulances'));
    }


    /**
     * Relasi ke model Pasien.
     */
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'nik_pasien');
    }

    /**
     * Relasi ke model Notification untuk notifikasi terkait supir.
     */
    public function notifications()
    {
        return $this->hasMany(Notifikasi::class, 'nip_supir', 'nip_supir');
    }
}
