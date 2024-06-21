<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project_year extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_year',
    ];
    
    public function project()
    {
    return $this->belongTO(Project::class);
    }
}
