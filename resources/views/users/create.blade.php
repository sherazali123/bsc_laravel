@extends($controller_name.'.master')
@section('main')


@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/'.$controller_name.'/create.js')!!}
@endsection
