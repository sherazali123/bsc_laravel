<p>
    {!! Form::label('Month', 'Month:') !!}
    <span class="field">
         {!! Form::select('month', $months, null, ['class' => 'form-control']) !!}
    </span>
</p>
<p>
    {!! Form::label('Actual Measure', 'Actual Measure:') !!}
    <span class="field">
        {!! Form::text('actual_measure',null,['class'=>'input-xxlarge', 'placeholder' => '0.0']) !!}
    </span>
</p>

<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
