<!-- -->
@extends('login_master')
 
@section('main')
 	<div class="loginwrapper">
	<div class="loginwrap zindex100 animate2 bounceInDown">
	<h1 class="logintitle"><span class="iconfa-lock"></span> Sign In <span class="subtitle">Hello! Sign in to get you started!</span></h1>
        <div class="loginwrapperinner">
        	@foreach($errors->all() as $error)
            <p class="alert alert-danger">{!!$error!!}</p>
        	@endforeach
        	{!!Form::open(['url'=>'/login','id' =>'loginform', 'method' => 'post'])!!}
            <!-- <form id="loginform" action="dashboard.html" method="post"> -->
                <p class="animate4 bounceIn">
                	{!! Form::text('email',Input::old('email'),['placeholder'=>'Email']) !!}
                	<!-- <input type="text" id="username" name="username" placeholder="Username" /> -->
                </p>
                <p class="animate5 bounceIn">
                	{!! Form::password('password',['placeholder'=>'Password']) !!}
                	<!-- <input type="password" id="password" name="password" placeholder="Password" /> -->
                </p>
                <p class="animate6 bounceIn">
                	{!!Form::submit('Sign in',['class'=>'btn btn-default btn-block'])!!}
                	<!-- <button class="btn btn-default btn-block">Submit</button> -->
                </p>
                <p class="animate7 fadeIn">
                	<a href="{!! URL::to('/register') !!}"><span class="icon-question-sign icon-white"></span> New User?</a>
                </p>
            {!!Form::close()!!}
        </div><!--loginwrapperinner-->
    </div>
    <div class="loginshadow animate3 fadeInUp"></div>
</div><!--loginwrapper-->

@stop