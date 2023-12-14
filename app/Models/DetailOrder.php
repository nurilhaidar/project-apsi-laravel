<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailOrder extends Model
{
    use HasFactory;

    protected $table = 'detail_order';

    protected $fillable = [
        'order_id',
        'order_jam_id',
    ];

    public function jam()
    {
        return $this->hasOne(JamOrder::class, 'order_jam_id', 'order_jam_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
}