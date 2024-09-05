<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('Posts.create'); // Points to resources/views/Posts/create.blade.php
    }

    public function store(Request $request)
    {
        // Your logic to store a post
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    public function index()
    {
        $posts = Post::all();
        return view('Posts.index', compact('posts')); // Points to resources/views/Posts/index.blade.php
    }

    public function show(Post $post)
    {
        return view('Posts.show', compact('post')); // Points to resources/views/Posts/show.blade.php
    }

    public function edit(Post $post)
    {
        return view('Posts.edit', compact('post')); // Points to resources/views/Posts/edit.blade.php
    }

    public function update(Request $request, Post $post)
    {
        // Your logic to update the post
        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
