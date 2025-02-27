@extends('web.contest.layout')

@section('title')
    @lang('contest.clarify.clarify') | @parent
@stop

@section('main')

    <table class="table table-striped">
        <thead>
        <tr>
            <th>@lang('table_columns.problem')</th>
            <th>@lang('table_columns.title')</th>
            <th>@lang('table_columns.user')</th>
            <th>@lang('table_columns.date')</th>
        </tr>
        </thead>
        <tbody>
        @foreach($topics as $topic)
        <tr>
            <td><a href="">{{ $topic->showProblemId() }}</a> </td>
            <td><a href="{{ route('topic.view', ['id' => $topic->id]) }}"> @if($topic->title) {{ $topic->title }} @else untitle @endif</a></td>
            <td><a href="{{ route('user.profile', ['username' => $topic->user->username]) }}">{{ $topic->user->username }}</a></td>
            <td>{{ $topic->created_at }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
    {{ $topics->render() }}

    @include('web.topic._compose')
@stop
