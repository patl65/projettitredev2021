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
        // //pour la mise en production : crée un utilisateur qu'il va chercher dans .env
        // User::create([
        //     'firstName' => config('settings.credentials.firstname'),
        //     'lastName' => config('settings.credentials.lastname'),
        //     'userName' => config('settings.credentials.username'),
        //     'email' => config('settings.credentials.email'),
        //     'password' => Hash::make(config('settings.credentials.password')),
        //     'email_verified_at' => now(),
        //     'phoneNumber' => config('settings.credentials.phoneNumber'),
        //     'address' => config('settings.credentials.address'),
        //     'postcode' => config('settings.credentials.postcode'),
        //     'city' => config('settings.credentials.city'),
        //     'country' => config('settings.credentials.country'),
        //     'created_at' => now(),
        //     'updated_at' => now(),
        //     'administrator' => true,
        //     'gtc' => true
        // ]);

        //le if permet de sécuriser les données de la BDD quand elle est en prod

        // Ligne pour changement PC et réup BDD avec des données tests
        // if(app()->environment('local') || app()->environment('install')) {
        // Ligne pour lancement site avec une BDD avec champs vides
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
