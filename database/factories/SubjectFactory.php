<?php

namespace Database\Factories;

use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Subject>
 */
class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->jobTitle(),
            'subject_code' => 'SC-000001',
            'description' => $this->faker->sentence(),
            'semester' => rand(0,1),
            'teacher_id' => rand(1,10),
            'classroom_id' => rand(1,5),
        ];
    }
}
