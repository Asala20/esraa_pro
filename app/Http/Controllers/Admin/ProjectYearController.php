<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\project_year;
use Illuminate\Http\Request;

class ProjectYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Find the ProjectYear model by ID
        $projectYear = project_year::find($id);

        // Ensure the model exists
        if (!$projectYear) {
            return response()->json(['message' => 'Project Year not found'], 404);
        }

        // Use the relationship to get the projects
        $thisYearProjects = $projectYear->projects;

        return response()->json([
            'message' => 'ok',
            'projects' => $thisYearProjects
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(project_year $project_year)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, project_year $project_year)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(project_year $project_year)
    {
        //
    }
}
