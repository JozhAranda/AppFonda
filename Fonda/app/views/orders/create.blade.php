@extends('layouts.master')
@section('content')
	<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" id="add-order">
		<h2 class="sub-header">Get order</h2>
		{{ Form::model($order, array('route' => 'orders.store', 'id'=> 'form-order')) }}
			@include('orders._form')
		{{ Form::close()}}
	</div>
@stop
