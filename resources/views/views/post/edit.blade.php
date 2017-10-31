@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>{{ $post->name }}</h1>
            {!! Form::open(['route' => ['post.destroy', $post->id], 'method' => 'delete', 'id' => 'deletePost']) !!}
            <p><a href="#" class="pull-right" onclick="document.getElementById('deletePost').submit()">Delete</a></p>
            {!! Form::close() !!}
            <p>{{ $post->content }}</p>
            @if(!empty($post->file))
                <p><a href="{{asset($post->file)}}" target="_blank">File</a></p>
            @endif
        </div>
    </div>

    {!! Form::model($post, ['enctype'=>'multipart/form-data','route' => ['post.update', $post->id], 'role' => 'form', 'method' => 'put']) !!}

        @include('views.post.partials.form')

    {!! Form::close() !!}

@endsection