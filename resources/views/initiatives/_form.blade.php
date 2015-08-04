<p>
    {!! Form::label('Name', 'Name:') !!}
    <span class="field">
        {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
    </span>
</p>
<p>
    {!! Form::label('Objective', 'Objective:') !!}
    <span class="field">
         {!! Form::select('objective_id', $objectives, null, ['class' => 'form-control']) !!}
    </span>
</p>
<p>
    {!! Form::label('description', 'Name:') !!}
    <span class="field">
        {!! Form::textarea('description',null,['class'=>'span6', 'placeholder' => 'Description']) !!}
    </span>
</p>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
