@extends('layouts.master')

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
	<h1>Order</h1>

	<hr>
    @foreach ($orders as $order)


	<h3>Name: {{ $order->name . $order->last_name }}</h3><br>
	<h3># Order: {{ $order->number }}</h3>
	<h3>Food name: {{ $order->food_name }}</h3><br>
	<h3>Paid: @if($order->checks == 1) Yes @else No @endif</h3><br>
	
    @endforeach
	<hr>
 </div>	
@stop