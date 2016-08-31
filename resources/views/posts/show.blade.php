@extends('main')

@section('content')
<div class="blog-post">
    <h2 class="blog-post-title">{{ $post->title }}</h2>
    <p class="blog-post-meta">
        {{ $post->published_at->format('F j, Y H:i A') . ' by ' . $post->Author->name }}
        @if(Auth::check())(<a href="{{ route('post.edit', $post->id) }}">Edit</a>)@endif
    </p>
    {{ $post->body }}
</div>

<hr>

<h3>Related posts</h3>
<div class="row">
    @foreach($related_posts as $post)
    <div class="col-lg-4 related-post">
        <h4>{{ $post->title }}</h4>
        <div class="excerpt">
            {{ Illuminate\Support\Str::words($post->body, 20) }}
            <p><a href="{{ route('post', [$post->id, str_slug($post->title)]) }}">Read more &raquo;</a></p>
        </div>
    </div>
    @endforeach
</div>
@endsection