<?php

use App\Comment;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 20)->create()->each(function ($post) {

            $faker = \Faker\Factory::create(); // une instance de faker
            for ($i = 0; $i < rand(1, 10); $i++) {

                $comment = new Comment([
                    'email' => $faker->email,
                    'content' => $faker->paragraph(1),
                    'post_id' => $post->id,
                    'published_at' => Carbon::now()
                ]);

                $comment->save();

            }

        });

    }
}
