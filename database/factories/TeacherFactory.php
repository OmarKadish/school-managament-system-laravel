<?php

namespace Database\Factories;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher::class;
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
            //in The Seed this doesn't work because the seed run all at once,
            // so it won't be able to check the DB for previous teacher_num.
            'teacher_num' => 'TN-000001',
            'email' => $this->faker->email(),
            'phone_number' => $this->faker->phoneNumber(),
            'birth_date' => Carbon::now()->subYears(rand(15,40)),
            'gender' => rand(0,1),
            'photo_path' => 'Teachers/blank.png',
        ];
//        date('D-m-y', $max = '2010',$min = '1980'),
    }

}
