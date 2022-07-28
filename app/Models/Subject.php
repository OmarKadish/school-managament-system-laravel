<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'description',
        'semester',
        'subject_code',
        'teacher_id',
        'classroom_id',
    ];

    public function classroom()
    {
        return $this->belongsTo('App\Models\Classroom');
    }
    public function teacher()
    {
        return $this->belongsTo('App\Models\Teacher');
    }
}
