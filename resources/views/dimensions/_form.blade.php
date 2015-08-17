<p>
    {!! Form::label('Strategic plan', 'Strategic plan:') !!}
    <span class="field">
         {!! Form::select('plan_id', $plans, null, ['class' => 'form-control']) !!}
    </span>
</p>
<p>
    {!! Form::label('Name', 'Name:') !!}
    <span class="field">
        {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => ''Enter dimension name']) !!}
    </span>
</p>

<p>
    {!! Form::label('description', 'Name:') !!}
    <span class="field">
        {!! Form::textarea('description',null,['class'=>'span6', 'placeholder' => ''Enter dimension description']) !!}
    </span>
</p>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
