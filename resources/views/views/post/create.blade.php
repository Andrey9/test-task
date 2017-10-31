@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>New Post</h1>
        </div>
    </div>

    {!! Form::open(['enctype'=>'multipart/form-data','route' => 'post.store', 'role' => 'form', 'class' => 'container']) !!}
        @include('views.post.partials.form')
    {!! Form::close() !!}
@endsection