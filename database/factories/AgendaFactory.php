<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class AgendaFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'subject' => $this->faker->sentence(3),
            'date' => $this->faker->date($format = 'Y-m-d'),
            'time' => $this->faker->time($format = 'H:i:s'),
            'status' => $this->faker->randomElement(['pending','made','canceled','not attended','approved']),
            'user_id' => $this->faker->numberBetween(1,20),
        ];
    }
}
