@extends('master')

@section('custom_assets')

@endsection
@section('breadcrumbwidget')
<div class="breadcrumbwidget">
   <ul class="skins">
         <li><a href="default" class="skin-color default"></a></li>
         <li><a href="orange" class="skin-color orange"></a></li>
         <li><a href="dark" class="skin-color dark"></a></li>
         <li>&nbsp;</li>
         <li class="fixed selected"><a href="#" class="skin-layout fixed"></a></li>
         <li class="wide"><a href="#" class="skin-layout wide"></a></li>
     </ul><!--skins-->
   <ul class="breadcrumb">
         <li><a href="dashboard.html">Home</a> <span class="divider">/</span></li>
         <li><a href="table-static.html">Tables</a> <span class="divider">/</span></li>
         <li class="active">Dynamic Table</li>
     </ul>
 </div><!--breadcrumbs-->
 <div class="pagetitle">
   <h1>{{{ $controller_heading or '' }}}</h1> <span>Add/edit/delete {{{ $controller_name or '' }}} from here</span>
 </div><!--pagetitle-->

@endsection
 @section('before_footerjs')
  	{!!HTML::script('/js/views/'.$controller_name.'/master.js')!!}
 @endsection
@stop
