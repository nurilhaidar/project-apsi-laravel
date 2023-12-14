<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Studio extends Model
{
    use HasFactory;

    protected $table = 'studio';

    protected $fillable = [
        'studio_id',
        'nama_studio',
        'kapasitas',
        'harga',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'studio_id', 'studio_id');
    }
}
