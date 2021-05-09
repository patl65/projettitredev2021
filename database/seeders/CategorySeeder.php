<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Expérience',
            'slug' => 'Expérience'
        ]);
        Category::create([
            'name' => 'Actualité',
            'slug' => 'Actualité'
        ]);
        Category::create([
            'name' => 'Conseil de Pro',
            'slug' => 'Conseil de Pro'
        ]);
        \App\Models\Category::factory(4)->create();
    }
}
