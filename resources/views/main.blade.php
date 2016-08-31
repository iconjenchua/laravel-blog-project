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
            <div class="container">
                <nav class="blog-nav">
                    <a class="blog-nav-item active" href="{{ url('') }}">Home</a>
                    @if(Auth::check())
                    <a class="blog-nav-item" href="{{ route('admin') }}">Admin</a>
                    @endif
                </nav>
            </div>
        </div>

        <div class="container">

            <div class="blog-header">
                <h1 class="blog-title">Laravel Blog Project</h1>
                <p class="lead blog-description">Just a simple blog running on Laravel 5.2</p>
            </div>

            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')
                </div>
                <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
                    <div class="sidebar-module sidebar-module-inset">
                        @if(Auth::check())
                        <a class="" href="{{ route('admin') }}">Admin</a>
                        @else
                        {{ Form::open(['url' => 'login', 'method' => 'post']) }}
                        <h4>User login</h4>
                        
                        @if(count($errors) > 0)
                        @foreach($errors->all() as $error)
                        <div class="alert alert-danger">{{ $error }}</div>
                        @endforeach
                        @endif
                        
                        <div class="form-group">
                            {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Email address']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Login', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
