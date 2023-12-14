<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamOrder extends Model
{
    use HasFactory;

    protected $table = 'order_jam';

    protected $fillable = [
        'order_jam_id',
        'jam',
    ];

    public function detail()
    {
        return $this->belongsTo(DetailOrder::class, 'order_jam_id', 'order_jam_id');
    }
}
