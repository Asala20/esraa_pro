<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Smalot\PdfParser\Parser;
use App\Models\Project;
use Exception;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpWord\IOFactory;
use setasign\Fpdi\PdfReader;
// use PhpOffice\PhpPresentation\IOFactory as PresentationIOFactory;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_file',
        'num_page',
        'num_download',
    ];
    protected $attributes = [
        'num_page' => 0,  // Default value for num_page
        'num_download' => 0,  // Default value for num_download
    ];
    public function project()
    {
    return $this->belongsTo(Project::class);
    }

    public static function countPages($filePath)
    {
        if (!file_exists($filePath)) {
            throw new Exception('File does not exist at path: ' . $filePath);
        }

        $parser = new Parser();
        $pdf = $parser->parseFile($filePath);
        $pages = $pdf->getPages();
        return count($pages);
    }

}
