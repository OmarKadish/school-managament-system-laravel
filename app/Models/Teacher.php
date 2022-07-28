<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $table='teachers';
    protected $primaryKey='id';
    public $fillable = [
        'first_name',
        'surname',
        'teacher_num',
        'birth_date',
        'email',
        'phone_number',
        'photo_path',
        'address',
        'gender',
    ];


    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'subjects', 'teacher_id', 'classroom_id');
    }
}
