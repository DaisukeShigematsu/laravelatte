<?php

namespace Database\Factories;

use App\Models\Timestamp;
use Illuminate\Database\Eloquent\Factories\Factory;


class TimestampFactory extends Factory
{
    protected $model = \App\Models\Timestamp::class;//モデル名をパスから指定

    public function definition()
    {
        return [
            'user_id' => $this->faker->realText,
            'work_start'=> $this->faker->now(),
            'work_end'  => $this->faker->now(),
            'date'    => $this->faker->format('Y-m-d H:i:s'),
        ];
    }
}
