<?php

namespace Database\Seeders;

use App\Models\Film;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Database\Factories\GenreFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create(
          
          [
            'name' => 'Dusan Nesic',
            'email' => 'dule95_cup@live.com',
          ]
       
      );

      User::factory()->create([
        'name' => 'Dusan Nesic',
        'email' => 'dusannesic28@gmail.com',
    ]);

      //Genre::factory(4)->create();



    }
}
