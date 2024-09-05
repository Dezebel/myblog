<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; //Import the Post model
use App\Models\User; //Import the User model
use Illuminate\Support\Facades\Auth;
use \DateTime;

class PostController extends Controller
{
      
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $posts=Auth::user()->posts;
       
        return view('Posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');

    }
    public function show(Post $post)

    {

        if(Auth::id()!==$post->user_id){// make route secure, unauthorised user
            abort(403);
        }
        return view('Posts.show', compact('post')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function test()
    {
        $results = Post::count();
        dd($results);
        //return view('Posts.test', compact('results'));
    }
}