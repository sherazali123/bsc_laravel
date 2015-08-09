@extends($controller_name.'.master')

@section('custom_assets')

@endsection

@section('main')

        <div class="maincontent">
        	<div class="contentinner">

            @include($controller_name.'._header')            	

            @include($controller_name.'._initiative', ['initiative_type' => 'single'])
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/show.js')!!}
@endsection

@stop
