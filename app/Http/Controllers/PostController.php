<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    // Method to create a new blog post
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // Create a new post with the validated data
        $post = Post::create($request->all());

        // Return the created post as JSON with a 201 status code
        return response()->json($post, 201);
    }

    // Method to list all blog posts
    public function index()
    {
        // Return all posts as JSON
        return response()->json(Post::all());
    }

    // Method to view a single blog post by ID
    public function show($id)
    {
        // Find the post by ID and return it as JSON
        return response()->json(Post::findOrFail($id));
    }
}
