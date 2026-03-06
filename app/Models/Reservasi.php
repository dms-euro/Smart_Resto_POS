<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    protected $table = 'reservasi' ;

    protected $fillable = [
        'nama_pelanggan',
        'no_hp',
        'jumlah_orang',
        'tanggal',
        'jam',
        'catatan',
        'status',
    ];
}
