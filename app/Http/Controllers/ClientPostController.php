<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\PostedJobs;
use Illuminate\Http\Request;

class ClientPostController extends Controller
{
    public function index()
    {
        return view('client.post.index');
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

            // Concatenate the location fields
            $location = $request->input('region') . ', ' .
                $request->input('province') . ', ' .
                $request->input('city') . ', ' .
                $request->input('barangay');

            // Create the job posting
            $job = PostedJobs::create([
                'job_title' => $request->input('job_title'),
                'job_description' => $request->input('job_description'),
                'salary' => $request->input('salary'),
                'image' => $imagePath,
                'status' => 0,
                'location' => $location,
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
