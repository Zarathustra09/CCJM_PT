<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }

    public function datatable()
    {
        $users = User::all();
        return response()->json(['data' => $users]);
    }

    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json(['data' => $user]);
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        return response()->json(['data' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'User has been updated.'], 200);
    }

    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        // Return a JSON response with a success status code (200)
        return response()->json(['message' => 'User has been deleted.'], 200);
    }
}
