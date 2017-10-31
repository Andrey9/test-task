<div id="comments_section" class="container">
    <h1>Comments</h1>
    @foreach($model->comments as $comment)
        @include('views.comment.index', ['comment' => $comment])
    @endforeach

</div>

<div class="container">
    {!! Form::open(['route' => 'comment.store', 'role' => 'form', 'id' => 'comment_form', 'class' => 'col-md-6']) !!}

    {!! Form::hidden('commentable_id', $model->id) !!}

    {!! Form::hidden('commentable_type', $commentable_type) !!}

    <div class="form-group">
        {!! Form::text('author', null, ['class' => 'form-control', 'placeholder' => 'Author']) !!}
    </div>

    <div class="form-group">
    {!! Form::textarea('content', null, ['class' => 'form-control', 'placeholder' => 'Content'] ) !!}
    </div>

    <div class="form-group">
    {!! Form::submit('Save', ['class' => 'form-control']) !!}
    </div>

    {!! Form::close() !!}
</div>