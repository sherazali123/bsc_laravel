@extends($controller_name.'.master')

@section('custom_assets')
{!!HTML::script('/js/jquery.uniform.min.js')!!}
{!!HTML::script('/js/jquery.dataTables.min.js')!!}
{!!HTML::script('/js/jquery.flot.min.js')!!}
{!!HTML::script('/js/jquery.flot.pie.js')!!}
{!!HTML::script('/js/jquery.flot.resize.min.js')!!}
@endsection

@section('main')




<div class="maincontent">



    <div class="contentinner">


        @include('actual_measures.measure')
        <div class="row-fluid" style="margin-bottom: 20px;">
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
                        <td>{{ $months[$row->month] }}</td>
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
        </div>
        <div class="row-fluid" style="margin-bottom: 20px;">
            <div class="span12">
                <h4 class="widgettitle">Bar Graph</h4>
                <br />
                <div id="bargraph" style="height:300px;"></div>
            </div>
        </div><!--row-fluid-->
    </div><!--contentinner-->
</div><!--maincontent-->

@endsection
@section('footer_js')
{!!HTML::script('/js/views/'.$controller_name.'/index.js')!!}
<script type="text/javascript">
    jQuery(document).ready(function() {
        /*****BAR GRAPH*****/
		var d2 = [];
		for (var i = 1; i <= 31; i++)
			d2.push([i, i]);
			
		var stack = 0, bars = true, lines = false, steps = false;
		jQuery.plot(jQuery("#bargraph"), [ d2 ], {
			series: {
				stack: stack,
				lines: { show: lines, fill: true, steps: steps },
				bars: { show: bars, barWidth: 0.6 }
			},
			grid: { hoverable: true, clickable: true, borderColor: '#ccc', borderWidth: 1, labelMargin: 10 },
			colors: ["#f93905"]
		});
    });
</script>
@endsection

@stop
