<?php

namespace Database\Factories;

use App\Models\Classroom;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory
 */
class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'parent_phone_number' => $this->faker->phoneNumber(),
            'birth_date' => Carbon::now()->subYears(15),
            'classroom_id' => Classroom::inRandomOrder()->first(),
            'address' => $this->faker->address(),
            'enrollment_date' => Carbon::now()->subYears(),
            'gender' => rand(0,1),
        ];
    }
}
