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
                    ->orWhere('professor', 'like', "%$searchTerm%")
                    ->orWhereHas('students', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%");
                        })
                    ->orWhereHas('tags', function ($q) use ($searchTerm) {
                        $q->where('name', 'like', "%$searchTerm%");
                    });
            });
        }

        $projects = $query->with('students', 'tags')->get();

        return response()->json($projects);
    }
}
