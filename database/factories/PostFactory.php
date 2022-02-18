<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
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
            'worker_id' => $this->faker->numberBetween(1,10),
            'post_title' => $this->faker->title,
            'post_content' => $this->faker->text
        ];
    }
}
