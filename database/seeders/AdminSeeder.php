<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //pour la mise en production : crée un utilisateur qu'il va chercher dans .env
        User::create([
            'firstName' => config('settings.credentials.firstname'),
            'lastName' => config('settings.credentials.lastname'),
            'userName' => config('settings.credentials.username'),
            'email' => config('settings.credentials.email'),
            'password' => Hash::make(config('settings.credentials.password')),
            'email_verified_at' => now(),
            'phoneNumber' => config('settings.credentials.phoneNumber'),
            'address' => config('settings.credentials.address'),
            'postcode' => config('settings.credentials.postcode'),
            'city' => config('settings.credentials.city'),
            'country' => config('settings.credentials.country'),
            'created_at' => now(),
            'updated_at' => now(),
            'administrator' => true,
            'gtc' => true
        ]);
    }
}
