@extends('AdminLTE.layout')
@section('page-title')
	<b>CHAN - Tâche</b>
@stop
@section('content')
{{ HTML::display_tasks($modify) }}

{{ Form::open() }}
	{{ Form::input('hidden', 'number', 1) }}
	{{ Form::input('submit', 'action', 'Une tache ?') }}

{{ Form::close() }}

@for($i = 0; $i < $entry; $i++ )
	{{ HTML::add_task() }}
@endfor

@stop