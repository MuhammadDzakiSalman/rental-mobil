<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'merek',
        'tipe',
        'nomor_plat',
        'tahun',
        'warna',
        'status',
        'harga_sewa',
        'denda',
        'gambar'
    ];

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'id_mobil');
    }
}
