@extends('layouts.admin')

@section('title', 'New Category')

@section('content')

    <div class="mb-4">
        <a href="{{ route('admin.categories.index') }}" class="btn btn-primary">Back</a>
    </div>

    <h1>New Category</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control col-md-6" id="name">
        </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="is_active" id="categoryActive" value="1" checked>
            <label class="form-check-label" for="categoryActive">
                Active
            </label>
        </div>
        <div class="form-group form-check">
            <input class="form-check-input" type="radio" name="is_active" id="categoryInactive" value="0">
            <label class="form-check-label" for="categoryInactive">
                Inactive
            </label>
        </div>
        <button type="submit" class="btn btn-primary mb-2">Submit</button>
    </form>

@endsection

