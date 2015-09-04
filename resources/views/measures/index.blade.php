@extends($controller_name.'.master')

@section('custom_assets')
    {!!HTML::script('/js/jquery.uniform.min.js')!!}
    {!!HTML::script('/js/jquery.dataTables.min.js')!!}
@endsection

@section('main')

        <div class="maincontent">
        	<div class="contentinner">

              @include('application._change_plan')


            	<h4 class="widgettitle"> @include('_legend') {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create'.'?plan_id='.$currentPlan->id.'&dimension_id='.$currentDimensionId.'&objective_id='.$currentObjectiveId)}}">Add new</a></h4>
                <table class="table table-bordered" id="index_1">
                    <colgroup>
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" style="align: center; width: 20%" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Name</th>
                            <th class="head1">Plan</th>
                            <th class="head1">Dimension</th>
                            <th class="head1">Objective</th>
                            <th class="head1">Initiative</th>
                            <th class="head1">Target</th>
                            <th class="head1">Actual</th>
                            <th class="head1">%</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                    	@foreach ($list as $row)
                     	   <tr class="gradeX">
                     	       <td>{{ $row->name }}</td>
                     	     <td>{{ $row->initiative->objective->dimension->plan->name }}</td>
                              <td>{{ $row->initiative->objective->dimension->name }}</td>
                              <td>{{ $row->initiative->objective->name }}</td>
                              <td>{{ $row->initiative->name }}</td>
                     	       <td>{{ round($row->target) }}</td>
                               <td>{{ round($row->actual) }}</td>
                               <td style="background-color:@if (round($row->percent,1)<=50)red
                         @elseif((round($row->percent,1)<=80))#FF9900 @elseif((round($row->percent,1)>80))#55BF3B @endif">{{ round($row->percent,1) }}%</td>
                     	       <td>
                                <a href="{{ URL::to('/measures/'.$row->id.'/actual_measures'.'?plan_id='.$row->initiative->objective->dimension->plan->id.'&dimension_id='.$row->initiative->objective->dimension->id.'&objective_id='.$row->initiative->objective->id) }}" class="btn  btn-primary" style="float: left;">Actual Measures</a>
                     	       		<a href="{{route($controller_name.'.edit',$row->id).'?plan_id='.$row->initiative->objective->dimension->plan->id.'&dimension_id='.$row->initiative->objective->dimension->id.'&objective_id='.$row->initiative->objective->id}}" class="btn" style="float: left;">Edit</a>
                     	       		{!! Form::open(['method' => 'DELETE', 'route'=>[$controller_name.'.destroy', $row->id]]) !!}
        						            {!! Form::submit('Delete', ['class' => 'btn', 'style' => 'margin-left: 15px;']) !!}
        						            {!! Form::close() !!}

                     	       </td>
                     	   </tr>
                     	@endforeach
                    </tbody>
                </table>

            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/index.js')!!}
@endsection

@stop
