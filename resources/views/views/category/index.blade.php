@extends('layouts.master')

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>Test task</h1>
        </div>
    </div>

    <div class="container">
        <div class="row">
            @foreach($categories as $category)
                <div class="col-md-4">
                    <h2>{{ $category->name }}</h2>
                    <p><a class="btn btn-default" href="{{ $category->getUrl() }}" role="button">View posts &raquo;</a></p>
                </div>
            @endforeach
        </div>
    </div>
@endsection