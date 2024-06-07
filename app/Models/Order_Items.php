<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_Items extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'order_id',
        'post_id',
        'kuantitas',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function product()
    {
        return $this->belongsTo(Post::class);
    }
}
