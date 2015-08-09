@extends($controller_name.'.master')

@section('custom_assets')
    {!!HTML::script('/js/jquery.uniform.min.js')!!}
    {!!HTML::script('/js/jquery.dataTables.min.js')!!}
@endsection

@section('main')

        <div class="maincontent">
        	<div class="contentinner">
                 @include('application._change_plan')    

            	<h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create')}}">Add new</a></h4>
            	<table class="table table-bordered" id="index_1">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" style="align: center; width: 30%" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Plan</th>
                            <th class="head1">Name</th>
                            <th class="head1">Description</th>
                             <th class="head1">AVERAGE %</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="head1">Plan</th>
                            <th class="head1">Name</th>
                            <th class="head1">Description</th>
                             <th class="head1">AVERAGE %</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    	@foreach ($list as $row)
                     	   <tr class="gradeX">
                     	       <td>{{ $row->plan->name }}</td>
                               <td>{{ $row->name }}</td>
                     	       <td>{{ $row->description }}</td>
                                 <td>{{ round($row->AVERAGE,2) }}%</td>
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
