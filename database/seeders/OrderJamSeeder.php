<?php

namespace Database\Seeders;

use App\Models\JamOrder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Nette\Utils\Random;

class OrderJamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        JamOrder::insert([
            [
                'order_jam_id' => '1',
                'jam' => '08:00 - 08:30',
            ],
            [
                'order_jam_id' => '2',
                'jam' => '08:30 - 09:00',
            ],
            [
                'order_jam_id' => '3',
                'jam' => '09:00 - 09:30',
            ],
            [
                'order_jam_id' => '4',
                'jam' => '09:30 - 10:00',
            ],
            [
                'order_jam_id' => '5',
                'jam' => '10:00 - 10:30',
            ],
            [
                'order_jam_id' => '6',
                'jam' => '10:30 - 11:00',
            ],
            [
                'order_jam_id' => '7',
                'jam' => '11:00 - 11:30',
            ],
            [
                'order_jam_id' => '8',
                'jam' => '11:30 - 12:00',
            ],
            [
                'order_jam_id' => '9',
                'jam' => '12:30 - 13:00',
            ],
            [
                'order_jam_id' => '10',
                'jam' => '13:00 - 13:30',
            ],
            [
                'order_jam_id' => '11',
                'jam' => '13:30 - 14:00',
            ],
            [
                'order_jam_id' => '12',
                'jam' => '14:00 - 14:30',
            ],
            [
                'order_jam_id' => '13',
                'jam' => '14:30 - 15:00',
            ],
            [
                'order_jam_id' => '14',
                'jam' => '15:00 - 15:30',
            ],
            [
                'order_jam_id' => '15',
                'jam' => '15:30 - 16:00',
            ],
            [
                'order_jam_id' => '16',
                'jam' => '16:00 - 16:30',
            ],
        ]);
    }
}
