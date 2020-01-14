<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $categories = Category::get();
        return view('admin.cms.category.index', compact('categories'));
    }
}