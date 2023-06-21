<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker_en = Faker::create('en_US');
        $faker_fr = Faker::create('fr_FR');
        $user_ids = [2, 5, 3, 4, 8, 10, 15, 20, 17, 19];

        foreach ($user_ids as $user_id) {
            Post::create([
                'title_en' => $faker_en->sentence(6, true),
                'body_en'  => $faker_en->paragraph(4, true),
                'title_fr' => $faker_fr->sentence(6, true),
                'body_fr'  => $faker_fr->paragraph(4, true),
                'user_id'  => $user_id,
            ]);
        }
    }
}
