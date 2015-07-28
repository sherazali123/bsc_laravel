@extends($controller_name.'.master')

@section('main')
        <div class="maincontent">
            <div class="contentinner">

              <h4 class="widgettitle"> {{{ $controller_heading or '' }}} <a href="{{url('/'.$controller_name.'/create')}}">Add new</a></h4>
                  {!! Form::model($row,['method' => 'PATCH','id' => 'edit_new','route'=>[$controller_name.'.update',$row->id]]) !!}
                    <p>
                        {!! Form::label('Name', 'Name:') !!}
                        <span class="field">
                            {!! Form::text('name',null,['class'=>'input-xxlarge', 'placeholder' => 'Name']) !!}
                        </span>
                    </p>
                    <p>
                        {!! Form::label('description', 'Name:') !!}
                        <span class="field">
                            {!! Form::textarea('description',null,['class'=>'span6', 'placeholder' => 'Description']) !!}
                        </span>
                    </p>
                    <div class="form-group">
                        {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
            </div><!--contentinner-->
        </div><!--maincontent-->

@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/edit.js')!!}
@endsection

@stop
