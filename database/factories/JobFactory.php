<?php

namespace Database\Factories;

use App\Models\Job;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        $sentence = $this->faker->sentence(2);
        return [
            'title' => $sentence,
            'slug' => Str::slug($sentence),//se remplit automatiquement avec le titre grâce à la variable$ et c'est pour l'URL (Str::slug)
            'contract' => $this->faker->sentence(10),
            'job' => $this->faker->sentence(300),
            'published' => $this->faker->boolean(80),//80% sont masqués
            'closed' => $this->faker->boolean(80),//80% sont masqués
            'user_id' => $this->faker->numberBetween(1, User::count())
        ];
    }
}
