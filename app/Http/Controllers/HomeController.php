<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; // Ensure you have the Post model available

class HomeController extends Controller
{
    /**
     * Create a new controller instance
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Assuming you have a Post model and a relationship defined between User and Post
        $posts = auth()->user()->posts; // Retrieve posts for the authenticated user

        // Pass the posts to the view
        return view('home', compact('posts'));
    }
}
