@extends('layouts.frontend')

@section('content')

@foreach ($posts as $post)
    <div class="nav-item">
        <a class="nav-link" href="{{ url('/') }}">
            {{ $post->title }}
        </a>
    </div>
@endforeach

@endsection

