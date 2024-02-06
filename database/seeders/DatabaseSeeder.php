<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $num_users = $this->command->ask("Quanti utenti?");
        $num_events = $this->command->ask("Quanti eventi?");
       
        

        $this->call(UserSeeder::class, false, compact("num_users"));
        $this->call(EventSeeder::class, false, compact("num_users"));

        $this->call(
         TagSeeder::class   
        );
        

    
    }
}
