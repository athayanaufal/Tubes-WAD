<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{

    protected $fillable = [
        'pesan',        
        'type',     
        'notifiable_id',
        'notifiable_type', 
    ];

    /**
     * Relasi polymorphic ke model penerima notifikasi.
     */
    public function notifiable()
    {
        return $this->morphTo();
    }
}
