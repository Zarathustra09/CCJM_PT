<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        try {
            return view('admin.users.index');
        } catch (\Exception $e) {
            return back()->with('error', 'An error occurred while displaying the index.');
        }
    }

    public function datatable()
    {
        try {
            $users = User::all();
            return response()->json(['data' => $users]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the users.'], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $user = User::find($id);
            return response()->json(['data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while retrieving the user.'], 500);
        }
    }

    public function edit(string $id)
    {
        try {
            $user = User::find($id);
            return response()->json(['data' => $user]);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while editing the user.'], 500);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $user = User::find($id);
            $user->update($request->all());

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'User has been updated.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while updating the user.'], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $user = User::find($id);
            $user->delete();

            // Return a JSON response with a success status code (200)
            return response()->json(['message' => 'User has been deleted.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'An error occurred while deleting the user.'], 500);
        }
    }
}
