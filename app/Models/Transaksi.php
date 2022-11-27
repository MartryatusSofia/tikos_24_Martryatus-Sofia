<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'konsers_id',
        'users_id',
        'nama',
        'email',
        'no_hp',
        'jumlah_tiket',
        'total_harga',
        'status',
    ];
    public function konser()
    {
        return $this->belongTo(Konser::class);
    }
    public function user()
    {
        return $this->belongTo(User::class);
    }
}

