@extends('main')

@section('content')
@if(count($posts))
@foreach($posts as $post)
<div class="blog-post">
    <h2 class="blog-post-title">
        <a href="{{ route('post', [$post->id, str_slug($post->title)]) }}">
            {{ $post->title }}
        </a>
    </h2>
    <p class="blog-post-meta">
        {{ $post->published_at->format('F j, Y H:i A') . ' by ' . $post->Author->name }}
        @if(Auth::check())(<a href="{{ route('post.edit', $post->id) }}">Edit</a>)@endif
    </p>
    {{ Illuminate\Support\Str::words($post->body, 20) }}
    <p><a href="{{ route('post', [$post->id, str_slug($post->title)]) }}">Read more &raquo;</a></p>
</div>
@endforeach
@else
<div class="alert alert-primary"><h3>No posts found</h3></div>
@endif
<div class="pagination">
    {{ $posts->links() }}
</div>
@endsection