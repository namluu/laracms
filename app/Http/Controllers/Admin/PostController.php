<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use Auth;

class PostController extends \App\Http\Controllers\Controller
{
    public function __construct(
        Post $post
    ) {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$posts = Post::get();
        $posts = $this->post->getAll();
        return view('admin.cms.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.cms.post.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.cms.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body' => 'required',
            'is_active'=>'required'
        ]);
        $post = new Post([
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'category_id' => $request->input('category_id'),
            'admin_id' => Auth::guard('admin')->user()->id,
            'is_active' => $request->input('is_active')
        ]);
        $post->save();
        return redirect('admin/cms/posts/'.$post->id)->with('success','Saved successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::get();
        return view('admin.cms.post.edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title'=>'required',
            'body' => 'required',
            'is_active'=>'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->category_id = $request->input('category_id');
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_active = $request->input('is_active');
        $post->save();
        return redirect('admin/cms/posts/'.$id)->with('success','Saved successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect('admin/cms/posts')->with('success', 'Deleted successfully!');
    }
}