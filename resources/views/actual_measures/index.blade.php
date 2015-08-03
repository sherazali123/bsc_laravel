@extends($controller_name.'.master')

@section('custom_assets')
    {!!HTML::script('/js/jquery.uniform.min.js')!!}
    {!!HTML::script('/js/jquery.dataTables.min.js')!!}
@endsection

@section('main')




        <div class="maincontent">



        	<div class="contentinner">


              @include('actual_measures.measure')
            	<h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="/measures/{{ $measure_id }}/actual_measures/create">Add new</a></h4>
            	<table class="table table-bordered" id="index_1">
                    <colgroup>
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Month</th>
                            <th class="head1">Actual</th>
                            <th class="head1">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@foreach ($list as $row)
                     	   <tr class="gradeX">
                     	       <td>{{ $row->month }}</td>
                     	       <td>{{ $row->actual_measure }}</td>
                     	       <td>
                     	       		<a href="/measures/{{ $measure_id }}/actual_measures/{{ $row->id }}/edit" class="btn" style="float: left;">Edit</a>
                     	       		{!! Form::open(['method' => 'DELETE', 'route'=>['measures.actual_measures.destroy', $measure_id, $row->id]]) !!}
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
