@extends('layouts.admin')

@section('title', 'New Category')

@section('content')

    <div class="mb-4">
        <a href="{{ url('/admin/cms/categories') }}" class="btn btn-primary">Back</a>
    </div>

    <h1>New Category</h1>

    <form action="{{ url('/admin/cms/categories') }}" method="POST">
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

