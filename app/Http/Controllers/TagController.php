<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TagController extends Controller
{
    // Display a listing of the tags
    public function index()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }

    // Store a newly created tag in storage
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag = Tag::create($request->all());
        return response()->json($tag, 201);
    }

    // Display the specified tag
    public function show($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['message' => 'Tag not found'], 404);
        }
        return response()->json($tag);
    }

    // Update the specified tag in storage
    public function update(Request $request, $id)
    {
        // Check for both JSON and form-data input
        $data = $request->json()->all() ?: $request->only('name');

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
        ]);

        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $tag->update($data);

        return response()->json($tag);
    }
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if (is_null($tag)) {
            return response()->json(['message' => 'Tag not found'], 404);
        }

        $tag->delete();
        return response()->json(null, 204);
    }
}
