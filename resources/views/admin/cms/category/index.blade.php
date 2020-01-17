@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
    <div class="mb-4">
        <a href="{{ url('/admin/cms/categories/create') }}" class="btn btn-primary">Add Category</a>
    </div>

    <table class="table table-hover table-sm">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->name }}</td>
                <td>{{ $category->is_active }}</td>
                <td>{{ $category->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection

