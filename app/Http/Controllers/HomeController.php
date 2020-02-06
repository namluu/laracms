<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', 1)
            ->orderBy('name', 'desc')
            ->get();
        $posts = Post::get();
        return view('home', compact(['categories', 'posts']));
    }
}