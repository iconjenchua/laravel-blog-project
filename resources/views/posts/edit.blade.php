@extends('admin.main')

@section('content')
<h2>Edit post</h2>

{{ Form::model($post, ['url' => route('post.save', $post->id), 'method' => 'post']) }}
<div class="well">
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    
    @if(Session::has('info'))
    <div class="alert alert-info">{{ Session::get('info') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-8">
            <div class="form-group">
                {{ Form::label('title') }}
                {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Title']) }}
            </div>
        </div>
        <div class="col-lg-3">
            <div class="form-group">
                {{ Form::label('Author') }}
                {{ Form::select('user_id', $users, null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-lg-1">
            <div class="form-group">
                {{ Form::label('Active') }}
                {{ Form::select('active', [1 => 'Yes', 0 => 'No'], null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
    
    <div class="form-group">
        {{ Form::label('Body') }}
        {{ Form::textarea('body', null, ['class' => 'form-control']) }}
    </div>
    
    <div class="form-group">
        {{ Form::submit('Save post', ['class' => 'btn btn-primary']) }}
        <a href="{{ route('admin') }}" class="btn btn-danger">Cancel</a>
    </div>
</div>
{{ Form::close() }}

<p><a href=" {{ route('admin') }}">&laquo; Back to dashboard</a></p>

@endsection