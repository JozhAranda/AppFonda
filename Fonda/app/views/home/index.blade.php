@extends('layouts.master')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <!--<h1 class="page-header">Dashboard</h1>-->

    <!--<div class="row placeholders">
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/sky" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
      <div class="col-xs-6 col-sm-3 placeholder">
        <img data-src="holder.js/200x200/auto/vine" class="img-responsive" alt="Generic placeholder thumbnail">
        <h4>Label</h4>
        <span class="text-muted">Something else</span>
      </div>
    </div>-->

    <h2 class="sub-header">Orders</h2>
    <div class="table-responsive">

      <table class="table table-striped">
        <thead>
          <tr>
            <th>Order number</th>
             @if($auth)
            <th>Name user</th>
            <th>Last name</th>
            <th>Actions</th>
             @endif
            <th>Foods</th>
            <th>Date (Day) </th>
          </tr>
        </thead>
        <tbody>          
    @foreach ($orders as $order)
          <tr>
            
            <td>{{$order->number}}</td>
            
            @if($auth)
            <td>{{$order->user->name}}</td>
            <td>{{$order->user->last_name}}</td>
              <td>
              @if($order->check == 1)
                {{ Form::submit('Check', array('class' => 'btn btn-disable btn-xs')) }}
              @else  
                {{ Form::model($order, array('method' => 'PUT', 'route' => array('orders.update', $order->number, 'id'=>'user'))) }}
                  {{ Form::submit('Check', array('class' => 'btn btn-warning btn-xs', 'value' => '1')) }}
                {{ Form::close() }}
              @endif
             </td>
           @endif
           <td>{{ link_to('orders/show_orders', 'View', $order->id, array('class' => 'btn btn-primary btn-xs')) }}</td>
           <td>{{$order->created_at}} / {{ date('D', strtotime($order->created_at))}}</td>
          </tr>
    @endforeach
        </tbody>
      </table>
      
    </div>
  </div>

@stop