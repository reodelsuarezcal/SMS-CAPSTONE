<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\parents;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\parents>
 */
class parentsFactory extends Factory
{
    protected $model = parents::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    
    {  
        return [

            'lastname' => $this->faker->lastName,
            'firstname' => $this->faker->firstName,
            'middlename' => $this->faker->optional()->firstName,
            'birthday' => $this->faker->date(),
            'civil_stat' => $this->faker->randomElement(['Single', 'Married','Widowed','Legally separated']),
            'contact_no' => $this->faker->regexify('(09)[0-9]{9}'),
        
        ];
    }
}
