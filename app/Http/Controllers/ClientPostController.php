<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
