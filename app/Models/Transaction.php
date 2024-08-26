<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_mobil',
        'id_user',
        'tanggal_selesai',
        'jumlah_hari',
        'denda',
        'total_harga',
        'total_pembayaran',
        'bukti_pembayaran',
        'status_rental',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
    ];

    public function car()
    {
        return $this->belongsTo(Car::class, 'id_mobil');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
