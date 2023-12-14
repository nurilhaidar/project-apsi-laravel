<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'order_id',
        'studio_id',
        'tema_id',
        'transaksi_id',
        'customer_id',
        'order_jam_id',
        'tgl'
    ];

    public function detail()
    {
        return $this->hasMany(DetailOrder::class, 'order_id', 'order_id');
    }

    public function studio()
    {
        return $this->hasOne(Studio::class, 'studio_id', 'studio_id');
    }

    public function tema()
    {
        return $this->hasOne(Tema::class, 'tema_id', 'tema_id');
    }

    public function transaksi()
    {
        return $this->hasOne(Transaksi::class, 'transaksi_id', 'transaksi_id');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'customer_id', 'customer_id');
    }
}
