<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Specialization extends Model
{
    use HasFactory;
    protected $fillable = [
        
        'section',
        
        
    ];
    public function students()
    {
    return $this->hasMany(Student::class);
    }
}
