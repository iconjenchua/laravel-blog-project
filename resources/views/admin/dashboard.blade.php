@extends('admin.main')

@section('content')
<h2>Blog Posts</h2>
<p><a href="{{ route('post.create') }}" class="btn btn-primary">Create new post</a></p>

@if(Session::has('info'))
<div class="alert alert-info">{{ Session::get('info') }}</div>
@endif
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
                {{ Form::open(['url' => route('post.delete', $post->id), 'id' => 'delete-post-' . $post->id]) }}
                {{ Form::hidden('_method', 'DELETE') }}
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-xs btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                <button type="button" class="btn btn-xs btn-danger delete-post-btn" data-id="{{ $post->id }}"><span class="glyphicon glyphicon-remove"></span></button>
                {{ Form::close() }}
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

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete-post-btn').on('click', function(e) {
            e.preventDefault();
            
            if(confirm('Are you sure you want to delete this post?')) {
                $('#delete-post-' + $(this).data('id')).submit();
            }
        });
    });
</script>
@endsection