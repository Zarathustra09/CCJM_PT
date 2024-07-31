<?php

namespace App\Http\Controllers;

use App\Models\PostedJobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return view('admin.post.index');
    }

    public function datatable()
    {
        $jobs = PostedJobs::all();
        return response()->json(['data' => $jobs]);
    }

    public function show(string $id)
    {
        $jobs = PostedJobs::find($id);
        return response()->json(['data' => $jobs]);
    }

    public function edit(string $id)
    {
        $jobs = PostedJobs::find($id);
        return response()->json(['data' => $jobs]);
    }

    public function update(Request $request, string $id)
    {
        $jobs = PostedJobs::find($id);
        $jobs->update($request->all());

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'Job has been updated.'], 200);
    }

    public function destroy(string $id)
    {
        $jobs = PostedJobs::find($id);
        $jobs->delete();

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'Job has been deleted.'], 200);
    }
}
