<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
 class studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
   {
        return [
           'name' =>$this->faker->name(),
          'email' =>$this->faker->safeEmail(),
            'phone_no' => $this->faker->phoneNumber(),
            'age' => $this->faker->numberBetween(10, 100),
           'gender' => $this->faker->randomElement([
               'male',
                'female'
           ])
        ];
    }
}
