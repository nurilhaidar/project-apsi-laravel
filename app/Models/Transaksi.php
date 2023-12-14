<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $fillable = [
        'transaksi_id',
        'total_harga',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'transaksi_id', 'transaksi_id');
    }
}
