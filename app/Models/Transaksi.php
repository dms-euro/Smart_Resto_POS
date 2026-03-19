<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'kode_transaksi',
        'meja_id',
        'user_id',
        'tanggal',
        'total',
        'bayar',
        'kembali',
    ];

    protected static function boot()
{
    parent::boot();

    static::creating(function ($transaksi) {
        $latest = Transaksi::latest('id')->first();
        $nextId = $latest ? $latest->id + 1 : 1;
        $transaksi->kode_transaksi = 'TRX-' . $nextId;
    });
}

    public function meja()
    {
        return $this->belongsTo(Meja::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function detailTransaksi()
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
