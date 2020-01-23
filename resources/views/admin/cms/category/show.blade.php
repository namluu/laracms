@extends('layouts.admin')

@section('title', 'Edit Category')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
    </div>

    <h1>Category: {{ $category->name  }}</h1>
    <p>Name: {{ $category->name }}</p>
    <p>Active: {{ $category->is_active == 1 ? 'Yes' : 'No' }}</p>

    <div>
        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-primary btn-sm float-left mr-2">Edit</a>
        <form class="form-inline" action="{{ route('admin.categories.destroy', $category->id)}}" method="post">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger btn-sm" type="submit">Delete</button>
        </form>
    </div>

@endsection

