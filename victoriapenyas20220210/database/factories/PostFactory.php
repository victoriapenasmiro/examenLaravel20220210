<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->word(),
            'extracto' => $this->faker->Sentence(2),
            'contenido' => $this->faker->Sentence(),
            'caducable' => $this->faker->boolean(),
            'comentable' => $this->faker->boolean(),
            'acceso' => $this->faker->randomElement(['publico', 'privado']),
            'fecha_publicacion' => now(),
            'user_id' => $this->faker->numberBetween(1,Post::count()),
        ];
    }
}
