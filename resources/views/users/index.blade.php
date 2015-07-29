@extends($controller_name.'.master')

@section('custom_assets')
    {!!HTML::script('/js/jquery.uniform.min.js')!!}
    {!!HTML::script('/js/jquery.dataTables.min.js')!!}
@endsection

@section('main')


@endsection
@section('footer_js')
 	{!!HTML::script('/js/views/dimensions/index.js')!!}
@endsection

@stop
