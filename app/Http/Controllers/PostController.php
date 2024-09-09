<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Get all posts and return as JSON for React
        $posts = Post::all();
        return response()->json($posts);
    }

    /**
     * Show the specified resource.
     */
    public function show(Post $post)
    {
        // Return the post data as JSON
        return response()->json($post);
    }

    public function test()
    {
        // For testing, return the count of posts as JSON
        $results = Post::count();
        return response()->json(['total_posts' => $results]);
    }
}