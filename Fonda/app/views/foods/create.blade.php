@extends('layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		<h2 class="sub-header">Add</h2>
		{{ Form::model($food, array('route' => 'foods.store', 'id'=> 'add-food')) }}
			@include('foods._form')
		{{ Form::close()}}
	</div>
@stop