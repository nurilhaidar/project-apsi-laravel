<?php

namespace Database\Seeders;

use App\Models\Studio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Studio::insert([
            [
                'studio_id' => '1',
                'nama_studio' => 'Studio 1',
                'kapasitas' => '1',
                'harga' => '30000'
            ],
            [
                'studio_id' => '2',
                'nama_studio' => 'Studio 2',
                'kapasitas' => '2',
                'harga' => '60000'
            ],
            [
                'studio_id' => '3',
                'nama_studio' => 'Studio 3',
                'kapasitas' => '4',
                'harga' => '100000'
            ],
        ]);
    }
}
