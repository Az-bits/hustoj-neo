@extends('web.app')

@section('title')
    Conjunto de Problemas Volumen {{ current_page() }} | @parent
@stop
@section('content')
    <div class="mb-4 row">
        <div class="col-md-8">
            {!! $problems->render() !!}
        </div>
        <div class="col-md-4">
            @include('web.problem.searchform')
        </div>
    </div>

    @include('web.problem.table', ['plist' => $problems])
@stop
