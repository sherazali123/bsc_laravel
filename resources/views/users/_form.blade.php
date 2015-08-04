<p>
    {!! Form::label('Company name', 'Company name:') !!}
    <span class="field">
        {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
    </span>
</p>
<p>
    {!! Form::label('Email', 'Email:') !!}
    <span class="field">
        {!! Form::text('email',Input::old('email'),['class'=>'input-xxlarge', 'placeholder'=>'Email']) !!}
    </span>
</p>
<p>
    {!! Form::label('Password', 'Password:') !!}
    <span class="field">
        {!! Form::password('password',['class'=>'input-xxlarge', 'placeholder'=>'Password']) !!}
    </span>
</p>
<p>
    {!! Form::label('Confirm Password', 'Confirm Password:') !!}
    <span class="field">
    {!! Form::password('password_confirmation',['class'=>'input-xxlarge', 'placeholder'=>'Confirm password']) !!}
    </span>
</p>
<div class="form-group">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
