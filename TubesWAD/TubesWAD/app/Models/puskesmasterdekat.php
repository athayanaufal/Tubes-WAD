<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class puskesmasterdekat extends Model
{
    use HasFactory;

    protected $table = 'puskesmas';

    protected $fillable = [
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'telepon',
    ];
}