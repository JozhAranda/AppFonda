@extends('layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="add-user">
		@if(isset($errors))
			<ul>
				@foreach($errors as $err)
					<li>{{$err}}</li>
				@endforeach
			</ul>
		@endif
		<h2 class="sub-header">Add</h2>
		{{ Form::model($user, array('route' => 'users.store', 'id'=> 'form-user')) }}
			@include('users._form')
		{{ Form::close()}}
	</div>
@stop