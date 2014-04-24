@extends('layouts.master')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Orders</h2>
    <div class="table-responsive">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Last name</th>
            <th>Number</th>
            <th>Food</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>          
    @foreach ($orders as $order)
          <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->last_name}}</td>
            <td>{{$order->number}}</td>
            <td>{{$order->food_name}}</td>
            <td>
            @if($order->check == 1)
              {{ Form::submit('Check', array('class' => 'btn btn-disable btn-xs')) }}
            @else  
              {{ Form::model($order, array('method' => 'PUT', 'route' => array('orders.update', $order->number, 'id'=>'user'))) }}
                {{ Form::submit('Check', array('class' => 'btn btn-warning btn-xs', 'value' => '1')) }}
              {{ Form::close() }}
            @endif
           </td>
          </tr>
    @endforeach
        </tbody>
      </table>
      
    </div>
  </div>

@stop