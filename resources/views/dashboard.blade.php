@extends('master')
 
@section('custom_assets')
      {!!HTML::script('/js/highchart.js')!!}
      {!!HTML::script('/js/highcharts-more.js')!!}
      {!!HTML::script('/js/exporting.js')!!}
@endsection

@section('main')
 
      
	<div class="pagetitle">
            <h1>Dashboard</h1> <span>Dashboard page display all plans</span>
      </div><!--pagetitle-->

        <div class="maincontent">
            <div class="contentinner content-dashboard">
                
                <div class="row-fluid">
                    <div class="span11">
                    </div>
                    
                       <div class="span11" style="margin-left: 45px;">
                           <div id="accordion" class="accordion">
                       @foreach ($plans as $row)
                        
                        <h4 class="widgettitle">{{ $row->name }}</h4>
                        <div class="widgetcontent">
                            
                         <div id="container-{{ $row->id }}" style="margin: 0 auto"></div>
                         <div id="container-sec-{{ $row->id }}" style="margin: 0 auto"></div>
                        </div><!--widgetcontent-->
                        @endforeach
                    </div>
                            
                    </div>
                    <!--span12-->
               
                </div><!--row-fluid-->
            </div><!--contentinner-->
        </div><!--maincontent-->
        
 @section('footer_js')
 	{!!HTML::script('/js/views/master.js')!!}
	<script type="text/javascript">
             var graphData = {!! $graph !!};
             
	</script>
      {!!HTML::script('/js/views/dashboard/index.js')!!}

@endsection

@stop