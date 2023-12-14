<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::insert([
            [
                'customer_id' => rand(1, 100),
                'nama' => 'Frisaranda',
                'no_hp' => '081234567890',
            ],
            [
                'customer_id' => rand(1, 100),
                'nama' => 'Diouf',
                'no_hp' => '081234567890',
            ]
        ]);
    }
}
