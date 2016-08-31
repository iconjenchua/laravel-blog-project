<!DOCTYPE html>
<html>
    <head>
        <title>{{ $page_title }}</title>

        <!-- scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

        <!-- styles  -->
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <link href="{{ url('assets/css/blog.css') }}" rel="stylesheet">

    </head>
    <body>
        <div class="blog-masthead">
            <div class="admin-container">
                <nav class="blog-nav">
                    <a class="blog-nav-item" href="{{ url('') }}">Home</a>
                    <a class="blog-nav-item active" href="{{ route('admin') }}">Admin</a>
                </nav>
            </div>
        </div>

        <div class="admin-container">

            <div class="blog-header">
                <h1 class="blog-title">Admin Dashboard</h1>
            </div>

            <h2>Blog Posts</h2>
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
        </div>
    </body>
</html>