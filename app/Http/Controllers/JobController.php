<?php

namespace App\Http\Controllers;

use App\Models\PostedJobs;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        try {
            return view('admin.post.index');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while displaying the index.');
        }
    }

    public function datatable()
    {
        try {
            $jobs = PostedJobs::all();
            return response()->json(['data' => $jobs]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the jobs.'], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $jobs = PostedJobs::find($id);
            return response()->json(['data' => $jobs]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the job.'], 500);
        }
    }

    public function edit(string $id)
    {
        try {
            $jobs = PostedJobs::find($id);
            return response()->json(['data' => $jobs]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while editing the job.'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $jobs = PostedJobs::find($id);
            $jobs->update($request->all());

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'Job has been updated.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the job.'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $jobs = PostedJobs::find($id);
            $jobs->delete();

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'Job has been deleted.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the job.'], 500);
        }
    }
}
