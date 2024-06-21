<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
       
        'name',
        'image',
        'tags',
        'details',
        'professor',
        'summary',  
    ];

    public function student()
    {
         return $this->belongsToMany(Student::class);
    }

    public function project_year()
    {
    return $this->hasMany(project_year::class);
    }
    
    public function book()
    {
    return $this->hasOne(Book::class);
    }
}
