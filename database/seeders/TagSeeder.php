<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            [
                'name' => 'Horror rock',
            ],
            [
                'name' => 'Metal',
              
            ],
            [
                'name' => 'Pop punk',
            ],
            [
                'name' => 'Tanz metal',
            ]
            ];

            foreach($tags as $tag){

                $newTag = new Tag();
                $newTag->fill($tag);
                $newTag->save();

            }
    }
}
