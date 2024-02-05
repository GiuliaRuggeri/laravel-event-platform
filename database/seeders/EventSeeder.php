<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'name' => 'Ghost',
                'date' => '2024/06/06',
                'available_tickets' => 450,
            ],
            [
                'name' => 'Metallica',
                'date' => '2025/11/07',
                'available_tickets' => 700,
            ],
            [
                'name' => 'Rammstein',
                'date' => '2024/12/08',
                'available_tickets' => 600,
            ],
            [
                'name' => 'Sum 41',
                'date' => '2024/12/09',
                'available_tickets' => 500,
            ]
            ];

            foreach($events as $event){

                $newEvent = new Event();
                $newEvent->fill($event);
                $newEvent->save();

            }
    }
}
