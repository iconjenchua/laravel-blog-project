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
                    <a class="blog-nav-item pull-right" href="{{ route('logout') }}">Logout</a>
                </nav>
            </div>
        </div>

        <div class="admin-container">

            <div class="blog-header">
                <a class="blog-nav-item active" href="{{ route('admin') }}"><h1 class="blog-title">Admin</h1></a>
            </div>

            @yield('content')
        </div>
    </body>
</html>