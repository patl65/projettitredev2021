<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sentence = $this->faker->sentence(2);
        return [
            'title' => $sentence,
            'slug' => Str::slug($sentence),//se remplit automatiquement avec le titre grâce à la variable$
            'content' => $this->faker->sentence(300),
            'published' => $this->faker->boolean(80),//80% sont masqués
            'refused' => $this->faker->boolean(40),//40% sont refusés
            'category_id' => $this->faker->numberBetween(1, Category::count()),
            'user_id' => $this->faker->numberBetween(1, User::count())
        ];
    }
}
