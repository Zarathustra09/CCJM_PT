<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\PostedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $jobs = PostedJobs::with(['agent', 'user', 'category'])->get();

        foreach ($jobs as $job) {
            $job->region_name = DB::table('regions')->where('region_id', $job->region)->value('name');
            $job->province_name = DB::table('provinces')->where('province_id', $job->province)->value('name');
            $job->city_name = DB::table('cities')->where('city_id', $job->city)->value('name');
            $job->barangay_name = DB::table('barangays')->where('id', $job->barangay)->value('name');

            // Concatenate location
            $job->full_location = "{$job->barangay_name}, {$job->city_name}, {$job->province_name}, {$job->region_name}";
        }

        return response()->json([
            'data' => $jobs,
        ]);
    }



    public function show(string $id)
    {
        try {
            $job = PostedJobs::with(['agent', 'user', 'category'])->findOrFail($id);

            // Fetch related location names
            $job->region_name = DB::table('regions')->where('region_id', $job->region)->value('name');
            $job->province_name = DB::table('provinces')->where('province_id', $job->province)->value('name');
            $job->city_name = DB::table('cities')->where('city_id', $job->city)->value('name');
            $job->barangay_name = DB::table('barangays')->where('id', $job->barangay)->value('name');

            // Concatenate location
            $job->full_location = "{$job->barangay_name}, {$job->city_name}, {$job->province_name}, {$job->region_name}";

            return response()->json(['data' => $job]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the job.'], 500);
        }
    }


    public function edit(string $id)
    {
        try {
            $jobs = PostedJobs::find($id);
            $agents = Agent::all(['agent_id', 'full_name']); // Fetch all agents with necessary fields
            return response()->json(['data' => $jobs, 'agents' => $agents]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while editing the job.'], 500);
        }
    }


    public function update(Request $request, string $id)
    {
        try {
            $jobs = PostedJobs::find($id);

            // Only update the specified fields
            $jobs->update([
                'job_title' => $request->input('job_title'),
                'job_description' => $request->input('job_description'),
                'salary' => $request->input('salary'),
                'status' => $request->input('status'),
                'agent_id' => $request->input('agent_id'),
            ]);

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'Job has been updated.'], 200);
        } catch (\Exception $e) {
            // Log the error message
            error_log($e->getMessage());

            // Return the actual error message in the JSON response
            return response()->json(['message' => 'An error occurred while updating the job.', 'error' => $e->getMessage()], 500);
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
