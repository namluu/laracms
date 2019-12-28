list posts

@foreach ($posts as $post)
    <p>{{ $post->title }}</p>
    <div>{{ $post->body }}</div>
@endforeach