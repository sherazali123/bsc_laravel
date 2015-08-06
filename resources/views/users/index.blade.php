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
                        <col class="con1"  />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Name</th>
                            <th class="head1">Email</th>
                             <th class="head1">Password</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($list as $row)
                     	   <tr class="gradeX">
                     	       <td>{{ $row->name }}</td>
                     	       <td>{{ $row->email }}</td>
                                <td> ******** </td>
                     	       <td>
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
