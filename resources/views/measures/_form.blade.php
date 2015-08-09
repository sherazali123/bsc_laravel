<p>
    {!! Form::label('Name', 'Name:') !!}
    <span class="field">
        {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
    </span>
</p>
<p>
    {!! Form::label('Initiative', 'Initiative:') !!}
    <span class="field">
         {!! Form::select('initiative_id', $initiatives, null, ['class' => 'form-control']) !!}
    </span>
</p>

<p>
    {!! Form::label('Target', 'Target:') !!}
    <span class="field">
        {!! Form::text('target',null,['class'=>'input-xxlarge', 'placeholder' => '0.00']) !!}
    </span>
</p>

<p>
    {!! Form::label('Description', 'Description:') !!}
    <span class="field">
        {!! Form::textarea('description',null,['class'=>'span6', 'placeholder' => 'Description']) !!}
    </span>
</p>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
