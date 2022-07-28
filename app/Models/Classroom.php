<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table='classrooms';
    protected $primaryKey='id';
    public $fillable = [
        'name',
        'description',
    ];

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
    public function students()
    {
        return $this->hasMany('App\Models\Student');
    }

}
