@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
    </div>

    <h1>Post: {{ $post->title }}</h1>
    <p>Title: {{ $post->title }}</p>
    <p>Active: {{ $post->is_active == 1 ? 'Yes' : 'No' }}</p>
    <p>Category: {{ $post->category->name }}</p>
    <div class="mb-5">{{ $post->body }}</div>

    <div>
        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
        <form class="form-inline" action="{{ route('admin.posts.destroy', $post->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </div>

@endsection

