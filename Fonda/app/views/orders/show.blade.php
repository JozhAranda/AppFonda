@extends('layouts.master')

@section('content')
	
	<h1>Order</h1>

	<hr>
    @foreach ($orders as $order)


	<h2>{{ $order->id }}</h2>
	<h2>{{ $order->user_id }}</h2>
	<h2>{{ $order->food_id }}</h2>
	<p>{{ $order->number }}</p><br>
	<p>{{ $order->check }}</p><br>
	
    @endforeach
	<hr>
	
@stop