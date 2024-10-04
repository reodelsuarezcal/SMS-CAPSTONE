<?php

namespace Database\Factories;

use App\Models\patients;
use Illuminate\Database\Eloquent\Factories\Factory;
class patientsFactory extends Factory
{

    protected $model = patients::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'patient_id' => $this->faker->unique()->numberBetween(25, 130),
            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->optional()->firstName, // Optional field
            'birthday' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'height' => $this->faker->numberBetween(150, 200),
            'weight' => $this->faker->numberBetween(1.10, 2.10), 
            'parent_id' => $this->faker->randomElement([2, 3, 4, 6]), 
        ];
    }
}
