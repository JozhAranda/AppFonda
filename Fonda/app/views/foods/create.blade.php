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
		<h2 class="sub-header">Create</h2>
		{{ Form::model($food, array('route' => 'foods.store', 'id'=> 'form-food')) }}
			@include('foods._form')
		{{ Form::close()}}
	</div>
@stop