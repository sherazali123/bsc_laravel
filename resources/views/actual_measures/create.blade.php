@extends($controller_name.'.master')
@section('main')

        <div class="maincontent">
            <div class="contentinner">

                <h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="/measures/{{ $measure_id }}/actual_measures/create">Add new</a></h4>
                  {!! Form::open(['route' => ['measures.actual_measures.store', $measure_id], 'id' => 'add_new']) !!}

                  @include($controller_name.'._form')
                    {!! Form::close() !!}
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/create.js')!!}
@endsection
