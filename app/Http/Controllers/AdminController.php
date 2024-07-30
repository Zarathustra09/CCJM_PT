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
        return view('admin.agent.index');
    }

    public function datatable()
    {
        $agents = Agent::all();
        return response()->json(['data' => $agents]);
    }

    public function show(string $id)
    {
        $agent = Agent::with('documents')->find($id);
        return response()->json(['data' => $agent]);
    }

    public function edit(string $id)
    {
        $Agent = Agent::find($id);
        return response()->json(['data' => $Agent]);
    }

    public function update(Request $request, string $id)
    {
        $Agent = Agent::find($id);
        $Agent->update($request->all());

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'Agent has been updated.'], 200);
    }

    public function destroy(string $id)
    {
        $Agent = Agent::find($id);
        $Agent->delete();

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'Agent has been deleted.'], 200);
    }


}
