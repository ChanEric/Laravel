@extends('AdminLTE.layout')
@section('page-title')
	<b>Login</b>
@stop
@section('content')

{{ Form::open() }}
	{{ Form::label('l_User', 'USERNAME : ')}}<br>
	{{ Form::text("username") }}<br><br>

	{{ Form::label('l_Password', 'PASSWORD : ')}}<br>
	{{ Form::password("password") }}<br><br>
	
	{{ Form::submit('Log in') }}

	{{ Form::close() }}
	
@stop