<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Project;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_file',
        'num_page',
        'num_download',
    ];
    public function project()
    {
    return $this->belongsTo(Project::class);
    }
}
