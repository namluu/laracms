<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('home', compact(['posts']));
    }
}