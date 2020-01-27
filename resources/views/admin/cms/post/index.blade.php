@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">Add Post</a>
    </div>

    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Status</th>
                <th>Category</th>
                <th>Author</th>
                <th>Created</th>
                <th style="width: 130px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <th>{{ $post->id }}</th>
                <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->title }}</a></td>
                <td>{{ $post->is_active }}</td>
                <td>{{ $post->category->name }}</td>
                <td>{{ $post->admin->name }}</td>
                <td>{{ $post->created_at }}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
                    <form class="form-inline" action="{{ route('admin.posts.destroy', $post->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

