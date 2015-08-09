@extends($controller_name.'.master')

@section('custom_assets')
    {!!HTML::script('/js/jquery.uniform.min.js')!!}
    {!!HTML::script('/js/jquery.dataTables.min.js')!!}
@endsection

@section('main')

        <div class="maincontent">
        	<div class="contentinner">

            	<h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create')}}">Add new</a></h4>
            	<table class="table table-bordered" id="index_1">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" style="align: center; width: 20%" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Name</th>
                            <th class="head1">Description</th>
                            <th class="head1">Period</th>
                            <th class="head1">Starting date</th>
                            <th class="head1">Ending date</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($list as $row)
                     	   <tr class="gradeX">
                     	       <td>{{ $row->name }}</td>
                     	       <td>
                                    @if (strlen($row->description) > 30)
                                        {{ substr($row->description, 0 ,27).'...' }}
                                    @else
                                        {{ $row->description }}
                                    @endif
                               </td>
                                <td>{{ $periods[$row->period] }}</td>
                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $row->starting_date)->format('M j, Y') }}</td>
                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d', $row->ending_date)->format('M j, Y') }}</td>
                     	       <td>
                                    <a href="{{route($controller_name.'.show',$row->id)}}" class="btn btn-primary" style="float: left;">View</a>
                     	       		<a href="{{route($controller_name.'.edit',$row->id)}}" class="btn" style="float: left;">Edit</a>
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
