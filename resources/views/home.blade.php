@extends('main')

@section('content')
@foreach($posts as $post)
<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">
        {{ $post->published_at->format('F j, Y H:i A') . ' by ' . $post->Author->name }}
        @if(Auth::check())(<a href="{{ route('post.edit', $post->id) }}">Edit</a>)@endif
    </p>
    {{ Illuminate\Support\Str::words($post->body, 20) }}
    <p><a href="{{ route('post', [$post->id, str_slug($post->title)]) }}">Read more &raquo;</a></p>
</div>
@endforeach

<div class="pagination">
    {{ $posts->links() }}
</div>
@endsection