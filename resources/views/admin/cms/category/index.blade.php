@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="mb-4">
        <a href="{{ route('admin.categories.create')}}" class="btn btn-primary">Add Category</a>
    </div>

    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Status</th>
                <th>Created</th>
                <th style="width: 130px">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th>{{ $category->id }}</th>
                <td><a href="{{ route('admin.categories.show', $category->id) }}">{{ $category->name }}</a></td>
                <td>{{ $category->is_active }}</td>
                <td>{{ $category->created_at }}</td>
                <td>
                    <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
                    <form class="form-inline" action="{{ route('admin.categories.destroy', $category->id)}}" method="post">
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

