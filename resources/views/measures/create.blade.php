@extends($controller_name.'.master')
@section('main')

        <div class="maincontent">
            <div class="contentinner">

                <h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create')}}">Add new</a></h4>
                  {!! Form::open(['url' => $controller_name, 'id' => 'add_new']) !!}
                      @include('measures._form')
                    {!! Form::close() !!}
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/create.js')!!}
@endsection
