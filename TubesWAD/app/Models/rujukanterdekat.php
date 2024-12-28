<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rujukanterdekat extends Model
{
    use HasFactory;

    protected $table = 'rujukan';

    protected $fillable = [
        'nama',
        'alamat',
        'telepon',
        'jenis_layanan',
    ];
}