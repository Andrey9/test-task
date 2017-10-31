<div class="form-group">
    {!! Form::label('name', 'Name') !!}

    {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('description', 'Description') !!}

    {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control']) !!}
</div>

{!! Form::submit('Save', ['class' => 'form-control']) !!}