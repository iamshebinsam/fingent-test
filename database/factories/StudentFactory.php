<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * @var string
     */
    protected $model = Student::class;

    
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(15, 20),
            'gender' => $this->faker->randomElement(['M', 'F']),
        ];
    }
}
