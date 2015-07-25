<!-- -->
@extends('login_master')
 
@section('main')

    <div class="loginwrapper">
    <div class="loginwrap zindex100 animate2 bounceInDown">
    <h1 class="logintitle"><span class="iconfa-lock"></span> Register Now!<span class="subtitle">Hello! Register yourself to get you started!</span></h1>
        <div class="loginwrapperinner">
            @foreach($errors->all() as $error)
                <p class="alert alert-danger">{!!$error!!}</p>
            @endforeach
            {!!Form::open(['url'=>'/register','id' =>'loginform', 'method' => 'post'])!!}
                <p class="animate4 bounceIn">
                    {!! Form::text('name',Input::old('name'),['placeholder'=>'Company name']) !!}
                </p>
                <p class="animate4 bounceIn">
                    {!! Form::text('email',Input::old('email'),['placeholder'=>'Email']) !!}
                </p>
                <p class="animate5 bounceIn">
                    {!! Form::password('password',['placeholder'=>'Password']) !!}
                </p>
                <p class="animate5 bounceIn">
                    {!! Form::password('password_confirmation',['placeholder'=>'Confirm password']) !!}
                </p>
                <p class="animate6 bounceIn">
                    {!!Form::submit('Register',['class'=>'btn btn-default btn-block'])!!}
                </p>
                <p class="animate7 fadeIn">
                    <a href="{!! URL::to('/login') !!}"><span class="icon-question-sign icon-white"></span> Sign in from here</a>
                </p>
            {!!Form::close()!!}
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->


@stop