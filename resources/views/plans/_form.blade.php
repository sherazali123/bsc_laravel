
<p>
    {!! Form::label('Name', 'Name:') !!}
    <span class="field">
        {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
    </span>
</p>
<p>
    {!! Form::label('Vision', 'Vision:') !!}
    <span class="field">
        {!! Form::text('vision',null,['class'=>'input-xxlarge', 'placeholder' => 'Vision']) !!}
    </span>
</p>
<p>
    {!! Form::label('Period', 'Period:') !!}
    <span class="field">
         {!! Form::select('period', $periods, null, ['class' => 'form-control']) !!}
    </span>
</p>
<p>
    {!! Form::label('Starting date', 'Starting date:') !!}
    <span class="field">
        {!! Form::text('starting_date',null,['class'=>'input-xxlarge', 'id' => 'starting_date' , 'placeholder' => 'xxxx-xx-xx']) !!}
    </span>
</p>
<p>
    {!! Form::label('Ending date', 'Ending date:') !!}
    <span class="field">
        {!! Form::text('ending_date',null,['class'=>'input-xxlarge', 'id' => 'ending_date' , 'placeholder' => 'xxxx-xx-xx']) !!}
    </span>
</p>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
