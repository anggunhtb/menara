<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservasi extends Model
{
    use HasFactory;

    protected $table = 'reservasi';

    protected $fillable = [
        'name',
        'tanggal_event',
        'waktu_event',
        'address',
        'phone',
        'event',
        'jumlah_anggota',
        'status'
    ];

    public function keranjang()
    {
        return $this->hasMany(Kategori::class, 'id');
    }

}
