<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';

    protected $fillable = [
        'order_id',
        'total_harga',
        'metode_pembayaran',
        'bukti_pembayaran',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
