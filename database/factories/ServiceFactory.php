<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $location = ['Nairobi', 'Mombasa', 'Nakuru', 'Kisumu', 'Machakos', 'Makueni', 'Kitui', 'Kakamega'];

        $locations_array = [
            ['-1.2900727', '36.787063'],
            ['-1.2899172', '36.7870404'],
            ['-1.3253544', '36.8513632'],
            ['-1.20473', '36.770685'],
        ];

        $current_location = $locations_array[rand(0, 3)];

        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->sentences(rand(5, 10)),
            'price' => rand(10000, 99999),
            'location' => $location[rand(0, 7)],
            'location_lat' => $current_location[0],
            'location_long' => $current_location[1],
        ];
    }
}
