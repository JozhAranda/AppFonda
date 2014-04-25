@extends('layouts.master')

@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">	
	<h1>Order</h1>

	<hr>
    <div class="table-responsive">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th># Order</th>
            <th>Food name</th>
            <th>Date order</th>
            <th>Paid</th>
          </tr>
        </thead>
        <tbody>  

    @foreach ($orders as $order)
          <tr>
            <td>{{ $order->name .' '. $order->last_name }}</td>
            <td>{{ $order->number }}</td>
            <td>{{ $order->food_name }}</td>
           	<td>{{ date("d F Y", strtotime($order->date_order)) }} at {{ date("g:ha", strtotime($order->date_order)) }}</td>
            <td>@if($order->checks == 1) Yes @else No @endif</td>
          </tr>
    @endforeach

        </tbody>
      </table>
      
	{{ link_to('/orders', 'Go back', array('class' => 'label label-info')) }}
    </div>
	<hr>
 </div>	
@stop