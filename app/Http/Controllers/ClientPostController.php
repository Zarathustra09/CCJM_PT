<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostedJobs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientPostController extends Controller
{
    public function index()
    {
        $jobs = PostedJobs::where('user_id', auth()->id())->get();

        foreach ($jobs as $job) {
            $job->region_name = DB::table('regions')->where('region_id', $job->region)->value('name');
            $job->province_name = DB::table('provinces')->where('province_id', $job->province)->value('name');
            $job->city_name = DB::table('cities')->where('city_id', $job->city)->value('name');
            $job->barangay_name = DB::table('barangays')->where('id', $job->barangay)->value('name');
        }

        return view('client.post.index', compact('jobs'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('client.post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the request data
            $request->validate([
                'job_title' => 'required|string|max:255',
                'job_description' => 'required|string',
                'salary' => 'required|numeric',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'region' => 'required|string',
                'province' => 'required|string',
                'city' => 'required|string',
                'barangay' => 'required|string',
                'category_id' => 'required|integer',
            ]);

            // Handle the image upload
            $imagePath = $request->file('image')->store('job_images', 'public');

            // Create the job posting
            $job = PostedJobs::create([
                'job_title' => $request->input('job_title'),
                'job_description' => $request->input('job_description'),
                'salary' => $request->input('salary'),
                'region' => $request->input('region'),
                'province' => $request->input('province'),
                'city' => $request->input('city'),
                'barangay' => $request->input('barangay'),
                'image' => $imagePath,
                'status' => 0,
                'category_id' => $request->input('category_id'),
                'user_id' => auth()->id(), // assuming the user is authenticated
                'agent_id' => null,
            ]);

            // Redirect or return response
            return redirect()->route('client.posts.index')->with('success', 'Job posted successfully.');
        } catch (\Exception $e) {
            // Log the exception
            \Log::error('Error in ClientPostController@store: ' . $e->getMessage());

            // Redirect or return response with error
            return back()->with('error', 'An error occurred while posting the job.');
        }
    }

}
