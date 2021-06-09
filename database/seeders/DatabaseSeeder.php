<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\JobSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\PostSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ImageSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\VideoYoutubeSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Ligne pour changement PC et récup BDD avec des données tests
        // if(app()->environment('local') || app()->environment('install')) {
        // Ligne pour lancement site avec une BDD avec champs vides

        //le if permet de sécuriser les données de la BDD quand elle est en prod
        //if: it's for securty datas of database when it will be in prod
        if (app()->environment('local')) {
            $this->call([
                UserSeeder::class,
                AdminSeeder::class,
                CategorySeeder::class,
                ImageSeeder::class,
                VideoYoutubeSeeder::class,
                PostSeeder::class,
                JobSeeder::class
            ]);
        }
    }
}
