<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;
use App\Models\Specialization;

class Student extends Model
{

    use HasFactory;
    protected $fillable = [
        'name',
        'year',
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
