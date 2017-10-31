@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>{{ $category->name }}</h1>
            <p><a href="{{ route('category.edit', $category->id) }}" class="pull-right">Edit</a></p>
            <p>{{ $category->description }}</p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($category->posts as $post)
                <div class="col-md-4">
                    <h2>{{ $post->name }}</h2>
                    <p><a class="btn btn-default" href="{{ $post->getUrl() }}" role="button">View posts &raquo;</a></p>
                </div>
            @endforeach
        </div>
    </div>

    @include('views.comment.comment_section', ['model' => $category, 'commentable_type' => 'Category'])
@endsection