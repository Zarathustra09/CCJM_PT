<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            return view('admin.agent.index');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while displaying the index.');
        }
    }

    public function datatable()
    {
        try {
            $agents = Agent::all();
            return response()->json(['data' => $agents]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the agents.'], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $agent = Agent::with('documents')->find($id);
            return response()->json(['data' => $agent]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the agent.'], 500);
        }
    }

    public function edit(string $id)
    {
        try {
            $Agent = Agent::find($id);
            return response()->json(['data' => $Agent]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while editing the agent.'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $Agent = Agent::find($id);
            $Agent->update($request->all());

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'Agent has been updated.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the agent.'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $Agent = Agent::find($id);
            $Agent->delete();

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'Agent has been deleted.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the agent.'], 500);
        }
    }
}
