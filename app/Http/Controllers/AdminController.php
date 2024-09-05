<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');// ensure you have admin.blade.php in the resource/views directory
    }
}
