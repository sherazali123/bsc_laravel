@extends($controller_name.'.master')

@section('main')
        <div class="maincontent">
            <div class="contentinner">

              <h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create'.'?plan_id='.$currentPlan->id.'&dimension_id='.$currentDimensionId.'&objective_id='.$currentObjectiveId)}}">Add new</a></h4>
                  {!! Form::model($row,['method' => 'PATCH','id' => 'edit_new','route'=>[$controller_name.'.update',$row->id]]) !!}
                      @include('measures._form')
                    {!! Form::close() !!}
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/edit.js')!!}
@endsection

@stop
