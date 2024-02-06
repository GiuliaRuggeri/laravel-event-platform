<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run($num_users, Faker $faker)
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
                $newEvent->user_id = $faker->numberBetween(1, $num_users);
                $newEvent->name = $event['name'];
                $newEvent->date = $event['date'];
                $newEvent->available_tickets = $event['available_tickets'];
                $newEvent->save();
               

            }
    }
}
