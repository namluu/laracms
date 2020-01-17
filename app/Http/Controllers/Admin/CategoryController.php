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

    public function create()
    {
        return view('admin.cms.category.create');
    }

    public function store(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('name');
        $category->is_active = $request->input('is_active');
        $category->save();
        if ($category) {
            return redirect('admin/cms/categories');
        }
    }
}