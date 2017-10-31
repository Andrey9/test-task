@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>{{ $category->name }}</h1>
            {!! Form::open(['route' => ['category.destroy', $category->id], 'method' => 'delete', 'id' => 'deleteCategory']) !!}
                <p><a href="#" class="pull-right" onclick="document.getElementById('deleteCategory').submit()">Delete</a></p>
            {!! Form::close() !!}
            <p>{{ $category->description }}</p>
        </div>
    </div>

    {!! Form::model($category, ['route' => ['category.update', $category->id], 'role' => 'form', 'method' => 'put', 'class' => 'container']) !!}

        @include('views.category.partials.form')

    {!! Form::close() !!}

@endsection