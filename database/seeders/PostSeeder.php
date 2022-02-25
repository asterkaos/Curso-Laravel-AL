<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts= Post::factory(300)->create();

        foreach($posts as $post){
            Image::factory(1)->create([
                'Imageable_id'=>$post->id,
                'Imageable_type'=>Post::class
            ]);
            $post->tag()->attach([
                rand(1, 4),
                rand(5, 8)
            ]);
        }
    }
}
