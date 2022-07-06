<?php

use App\Post;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 
            $post = new Post();
            $post->title = $faker->sentence(8);
            $post->content = $faker->text(250);
            $post->slug = Str::slug($post->title, '-');
    
            $post->save();
        }
    }
}
