@extends('layouts.admin')

@section('title', 'Edit Post')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Back</a>
    </div>

    <h1>New Post</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control col-md-6" id="title" value="{{ $post->title }}">
        </div>
        <div class="form-group">
            <label for="body">Body</label>
            <textarea name="body" class="form-control col-md-12" id="body" rows="12">{{ $post->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control col-md-6" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_active" id="active" value="1" {{ $post->is_active == 1 ? 'checked' : '' }}>
            <label class="form-check-label" for="active">
                Active
            </label>
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="radio" name="is_active" id="inactive" value="0" {{ $post->is_active == 0 ? 'checked' : '' }}>
            <label class="form-check-label" for="inactive">
                Inactive
            </label>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>

@endsection

