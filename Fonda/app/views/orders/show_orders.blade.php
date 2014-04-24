@extends('layouts.master')

@section('content')
	
	<h1>Order</h1>

	<hr>
@foreach($orders as $order)
	<h2>{{ $order->title }}</h2>
	<p>{{ $order->content }}</p><br>
@endforeach
	<hr>
	{{ link_to('/posts', 'Go back', array('class' => 'btn btn-xs')) }}

	{{ View::make('index'); }}
	
@stop