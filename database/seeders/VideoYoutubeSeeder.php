<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VideoYoutubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\VideoYoutube::factory(20)->create();
    }
}
