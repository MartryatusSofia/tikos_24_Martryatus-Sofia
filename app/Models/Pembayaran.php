<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'users_id',
        'transaksis_id',
        'nama',
        'jenis_pembayaran',
        'bukti_pembayaran',
    ];

    public function transaksi()
    {
        return $this->belongTo(Transaksi::class);
    }
    public function user()
    {
        return $this->belongTo(User::class);
    }
}
