@extends($controller_name.'.master')

@section('custom_assets')

@endsection

@section('main')

        <div class="maincontent">
        	<div class="contentinner">

            @include($controller_name.'._header')
               @include($controller_name.'._graph')
            @include($controller_name.'._initiative', ['initiative_type' => 'single'])
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
<script type="text/javascript">
     var graphData = {!! $graph !!};
</script>
{!!HTML::script('/js/highchart.js')!!}
 	{!!HTML::script('/js/views/'.$controller_name.'/show.js')!!}
@endsection

@stop
