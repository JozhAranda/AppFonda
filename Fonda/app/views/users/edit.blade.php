@extends('layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	@if(isset($errors))
		<ul>
			@foreach($errors as $err)
				<li>{{$err}}</li>
			@endforeach
		</ul>
	@endif
	<h2 class="sub-header">Edit</h2>
		{{ Form::model($user, array('method'=> 'PUT', 'route' => array('users.update', $user->id), 'id'=>'form-user')) }}
			@include('users._form')
		{{ Form::close() }}
	</div>
@stop