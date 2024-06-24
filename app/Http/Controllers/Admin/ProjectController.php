<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project :: all();
        return response()->json($project);
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
        $validated = $request->validate([
            'name' => 'required|string',
            // 'project_date' => 'date',
            'year_id' => 'required',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
            'book_id' => 'required|string',
            'details' => 'required|string',
            'summary' => 'required |string',
            'professor' => 'required|string',
        ]);

        $project = new Project;
        $project->name = $request->name;
        // $project->project_date = $request->project_date;
        $project->year_id = $request->year_id;
        $project->book_id = $request->book_id;
        $project->details = $request->details;
        $project->summary = $request->summary;
        $project->professor = $request->professor;
        if($request->hasFile('image')){
            $image = $request->file('image');
            $imageName =time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('image'), $imageName);
            $project->image = 'image/'.$imageName;

        }
        //  if($request->hasFile('book')){
        //      $book = $request->file('book');
        //      $bookName = time() . '.' . $book->getClientOriginalExtension();
        //      $book->move(public_path('book'), $bookName);
        //      $project->book = $bookName;
        //  }
        $project->save();
            return response()->json([
            "message" => "project added"
        ], 201);

}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $project = Project::find($id);
        if(!empty($project))
        {
        return response()->json($project);
        }
            else
        {
        return response()->json([
        "message" => "Not Found project"
            ] , 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'year_id' => 'required',
        'image' => 'nullable|image|mimes:jpeg,jpg,png,gif',
        'book_id' => 'required|string',
        'details' => 'required|string',
        'summary' => 'required|string',
        'professor' => 'required|string',
    ]);

    $project = Project::findOrFail($id);

    $data = $request->only(['name', 'book_id', 'year_id', 'details', 'summary', 'professor']);

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('image'), $imageName);
        $data['image'] = 'image/' . $imageName;
    }

    $project->update($data);

    return response()->json([
        'message' => 'Updated successfully',
        'project' => $project,
    ], 200);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        if(Project::where('id' , $id)->exists())
        {
            $project = Project::find($id);
            $project->delete();
            return response()->json([
            "message" => "deleted successfully"
            ] , 202);
        }
        else
        {
            return response()->json([
            "message" => "Not Found"
            ] , 404);
        }
    }

//     public function search(Request $request)
//     {
//         $query = Project::query();

//         if ($request->has('search')) {
//             $searchTerm = $request->input('search');

//             $query->where(function ($q) use ($searchTerm) {
//                 $q->where('name', 'like', "%$searchTerm%")
//                   ->orWhereHas('students', function ($q) use ($searchTerm) {
//                       $q->where('name', 'like', "%$searchTerm%");
//                   })
//                   ->orWhereHas('professor', function ($q) use ($searchTerm) {
//                       $q->where('name', 'like', "%$searchTerm%");
//                   })
//                   ->orWhereHas('tags', function ($q) use ($searchTerm) {
//                       $q->where('name', 'like', "%$searchTerm%");
//                   });
//             });
//         }

//         $projects = $query->with('students', 'professor', 'tags')->get();

//         return response()->json($projects);
//     }
}
