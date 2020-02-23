<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::find($id);
        $posts = Post::where('is_active', 1)
            ->orderBy('created_at', 'desc')
            ->get();
        return view('categories/show', compact(['category', 'posts']));
    }
}