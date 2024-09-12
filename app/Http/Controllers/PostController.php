<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Import the Post model

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Get all posts
        $posts = Post::all();
    
        // Check if the request has a 'callback' parameter
        if ($request->has('callback')) {
            $callback = $request->input('callback');
            // Return a JSONP response if 'callback' is present
            return response()->json($posts)->setCallback($callback);
        }
    
        // Return a regular JSON response if 'callback' is not present
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