<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'year',
        'project_id',
        'spec_id',
    
        
    ];
    public function specialization()
    {
    return $this->belongsTo(Specialization::class);
    }
    
    public function project()
    {
    return $this->belongsToMany(Project::class);
    }
}
