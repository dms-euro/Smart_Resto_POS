<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Meja extends Model
{
    protected $table = 'meja';
    protected $fillable = [
        'nomor_meja',
        'status',
    ];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
