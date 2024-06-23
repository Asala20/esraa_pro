<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // Display a listing of the students
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    // Store a newly created student in storage
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'year' => 'required',
            'spec_id' => 'required|integer|exists:specializations,id',
        ]);

        $student = Student::create($validatedData);

        return response()->json($student, 201);
    }

    // Display the specified student
    public function show( $id)
    {   $student = Student::find($id);
        return response()->json($student);
    }

    // Update the specified student in storage
    public function update(Request $request, $id)
    {   $student = Student::find($id);
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'year' => 'sometimes|required',
            'spec_id' => 'sometimes|required|integer|exists:specializations,id',
        ]);

        $student->update($validatedData);

        return response()->json($student);
    }

    // Remove the specified student from storage
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'message'=>"deleted Successfully",
            'status' => 200
        ]);
    }
}
