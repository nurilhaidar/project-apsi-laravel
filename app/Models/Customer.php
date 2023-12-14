<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customer';

    protected $fillable = [
        'customer_id',
        'nama',
        'no_hp',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'customer_id', 'customer_id');
    }
}
