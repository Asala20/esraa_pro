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
    protected $dates = ['deleted_at'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student__projects');
    }

    public function project_year()
    {
        return $this->belongsTo(project_year::class, 'year_id');
    }

    public function book()
    {
        return $this->hasOne(Book::class, 'id', 'book_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'project__tags');
    }
}
