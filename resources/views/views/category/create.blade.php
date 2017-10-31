@extends('layouts.master')

@section('content')

    <div class="jumbotron">
        <div class="container">
            <h1>New Category</h1>
        </div>
    </div>

    {!! Form::open(['route' => 'category.store', 'role' => 'form', 'class' => 'container']) !!}
        @include('views.category.partials.form')
    {!! Form::close() !!}
@endsection