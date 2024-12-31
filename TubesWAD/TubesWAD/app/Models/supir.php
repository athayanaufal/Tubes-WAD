<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupirAmbulan extends Model
{
    use HasFactory;

    protected $table = 'supir';

    protected $fillable = [
        'nama_supir',
        'nip_supir',
        'jenis_kelamin',
        'no_telepon',
        'alamat',
    ];

    // Contoh relasi jika ada catatan pengantaran pasien
    public function pasien()
    {
        return $this->hasMany(Pasien::class,);
    }
}
