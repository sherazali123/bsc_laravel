<!-- -->
@extends('login_master')
 
@section('main')
 
<div class="container">
    <div class="row">
         <div class="col-md-12">
             <p>Use the following links to login / register:
                 {!!HTML::link('/login','Login ',['class'=>'btn btn-link'])!!}/{!!HTML::link('/register',' Register',['class'=>'btn btn-link'])!!}
             </p>
         </div>
    </div>
</div>
 
@stop