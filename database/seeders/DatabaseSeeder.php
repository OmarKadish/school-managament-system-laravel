<?php

namespace Database\Seeders;

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $stdController = new StudentController();
        $subController = new SubjectController();
        $teacherController = new TeacherController();

        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
            'photo_path' => 'users/blank-profile.png',
            'created_at' => time(),
        ]);

        Classroom::factory()->count(5)->create();
        for ($i=0; $i< 15; $i++){
            Teacher::factory()->create([
                'teacher_num' => $teacherController->generateTeacherNumber(),
            ]);
            Student::factory()->create([
                'student_num' => $stdController->generateStudentNumber(),
            ]);
            Subject::factory()->create([
                'subject_code' => $subController->generateSubjectNumber(),
            ]);
        }
    }
}
