<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->realText,
            'rest_start'=> $this->faker->now(),
            'rest_end'  => $this->faker->now(),
            'date'    => $this->faker->format('Y-m-d H:i:s'),
        ];
    }
}
