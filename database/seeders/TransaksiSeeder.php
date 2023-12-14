<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transaksi::insert([
            [
                'transaksi_id' => rand(1,100),
                'total_harga' => '30000',
                'status' => 'Lunas'
            ],
            [
                'transaksi_id' => rand(1,200),
                'total_harga' => '40000',
                'status' => 'Lunas'
            ],
        ]);
    }
}
