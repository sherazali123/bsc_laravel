@extends('master')
 
@section('custom_assets')
      {!!HTML::script('/js/highchart.js')!!}
@endsection

@section('main')
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
                <li class="active">Dashboard</li>
            </ul>
        </div><!--breadcrumbs-->
      
	<div class="pagetitle">
            <h1>Dashboard</h1> <span>Dashboard page display all plans</span>
      </div><!--pagetitle-->

        <div class="maincontent">
            <div class="contentinner content-dashboard">
                
                <div class="row-fluid">
                       @foreach ($plans as $row)
                    <div class="span6">
                        
                        <h4 class="widgettitle">{{ $row->name }}</h4>
                        <div class="widgetcontent">
                         <div id="container-{{ $row->id }}" style="margin: 0 auto"></div>
                        </div><!--widgetcontent-->
                    </div>
                        @endforeach
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