<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\Tag;
use App\Models\project_year;


class Project extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'name',
        'image',
        'details',
        'professor',
        'year_id',
        'book_id',
        'summary',  
    ];

    public function student()
    {
         return $this->belongsToMany(Student::class);
    }

    public function project_year()
    {
    return $this->belongsTo(project_year::class, 'year_id');
    }
    
    public function book()
    {
    return $this->hasOne(Book::class);
    }

    public function tag()
    {
    return $this->belongsToMany(tag::class);
    }
}

