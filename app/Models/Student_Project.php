<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Student;


class Student_Project extends Model
{
    use HasFactory;
    protected $fillable = [

        'student_id',
        'project_id',

    ];
}
