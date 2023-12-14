<?php

namespace Database\Seeders;

use App\Models\Tema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tema::insert([
            [
                'tema_id' => '1',
                'nama_tema' => 'Halloween',
            ],
            [
                'tema_id' => '2',
                'nama_tema' => 'Coboy',
            ],
            [
                'tema_id' => '3',
                'nama_tema' => 'Dark',
            ],
            [
                'tema_id' => '4',
                'nama_tema' => 'Light',
            ],
            [
                'tema_id' => '5',
                'nama_tema' => 'Mantap-mantap',
            ]
        ]);
    }
}
