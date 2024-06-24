<?php

namespace App\Http\Controllers;
use App\Models\Project_Tag;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Student;
use App\Models\Tag;

class SearchController extends Controller
{
public function search(Request $request)
{
    $query = Project::query();

    if ($request->has('search')) {
        $searchTerm = $request->input('search');

        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%$searchTerm%")
              ->orWhereHas('students', function ($q) use ($searchTerm) {
                  $q->where('name', 'like', "%$searchTerm%");
              })
              ->orWhere('professor', 'like', "%$searchTerm%");
        });
    }

    if ($request->has('tags')) {
        $tags = explode(',', $request->input('tags'));//to turn the string to an array

        $query->whereHas('tags', function ($q) use ($tags) {
            $q->whereIn('name', $tags);
        }, '=', count($tags));
    }

    $projects = $query->with('students', 'tags')->get();

    return response()->json($projects);
}
}
