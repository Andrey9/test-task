@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>{{ $post->name }}</h1>
            <p><a href="{{ route('post.edit', $post->id) }}" class="pull-right">Edit</a></p>
            <p>{{ $post->content }}</p>
            @if(!empty($post->file))
                <p><a href="{{asset($post->file)}}" target="_blank">File</a></p>
            @endif
        </div>
    </div>

    @include('views.comment.comment_section', ['model' => $post, 'commentable_type' => 'Post'])
@endsection