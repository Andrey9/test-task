<div class="form-group">
    {!! Form::label('name', 'Name') !!}

    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('content', 'Content') !!}

    {!! Form::textarea('content', null, ['placeholder' => 'content', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}

    {!! Form::select('category_id', $categories, null, ['placeholder' => 'Choose category', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('file', 'File') !!}

    {!! Form::file('file', null, ['class' => 'form-control']) !!}
</div>

{!! Form::submit('Save',['class' => 'form-control']) !!}