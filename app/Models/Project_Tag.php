<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Project;

class Project_Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        
        
        'project_id',
        'tag_id',
         
    ];
}
