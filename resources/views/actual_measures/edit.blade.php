@extends($controller_name.'.master')

@section('main')
        <div class="maincontent">
            <div class="contentinner">

              <h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="/measures/{{ $measure_id }}/actual_measures/create">Add new</a></h4>
                  {!! Form::model($row,['method' => 'PATCH','id' => 'edit_new','route'=>['measures.actual_measures.update', $measure_id,$row->id]]) !!}
                  @include($controller_name.'._form')
                    {!! Form::close() !!}
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/edit.js')!!}
@endsection

@stop
