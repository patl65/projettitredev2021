<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
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
        Post::factory(30)->hasVideos(3)->create();
    }
    //pour info : 1 poste a 1 cotégorie (géré dans model/post) et 0 ou n photos ou videos
}
