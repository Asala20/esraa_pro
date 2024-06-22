<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class project_year extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_year',
    ];
    
    public function projects()
    {
    return $this->hasMany(Project::class , 'year_id');
    }
}
