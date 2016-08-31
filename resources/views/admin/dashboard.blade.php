@extends('admin.main')

@section('content')
<h2>Blog Posts</h2>
<p><a href="{{ route('post.create') }}" class="btn btn-primary">Create new post</a></p>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Active</th>
            <th>Published on</th>
            <th>Last updated</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @if(count($posts))
        @foreach($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ $post->Author->name }}</td>
            <td>{{ $post->active ? 'Yes' : 'No' }}</td>
            <td>{{ $post->published_at->format('F j, Y H:i A') }}</td>
            <td>{{ $post->updated_at->format('F j, Y H:i A') }}</td>
            <td>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
            </td>
        </tr>
        @endforeach
        @else
        <tr>
            <td colspan="6"><em>No posts found</em></td>
        </tr>
        @endif
    </tbody>
</table>

@if(count($posts))
{{ $posts->links() }}
@endif

@endsection