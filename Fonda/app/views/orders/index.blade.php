@extends('layouts.master')
@section('content')
  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <h2 class="sub-header">Orders</h2>
    <div class="table-responsive">

       <table class="table table-striped">
        <thead>
          <tr>
            <th>Order number</th>
             @if($auth)
            <th>Name user</th>
            <th>Last name</th>
            <th>Paid</th>
             @endif
            <th>Foods</th>
            <th>Date</th>
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
                {{ Form::submit('Yes', array('class' => 'btn disabled btn-xs', 'data-toggle' => 'popover', 'title' => 'Order paid', 'data-content' => 'And here some amazing content. It very engaging')) }}
              @else  
                {{ Form::model($order, array('method' => 'PUT', 'route' => array('orders.update', $order->number, 'id'=>'user'))) }}
                  {{ Form::submit('No', array('class' => 'btn btn-warning btn-xs', 'value' => '1', 'data-toggle' => 'popover', 'title' => 'Press if the user has already paid the order', 'data-content' => 'And here some amazing content. It very engaging')) }}
                {{ Form::close() }}
              @endif
             </td>
           @endif
           <td>{{ link_to_route('orders.show', 'View', $order->number, array('class' => 'btn btn-primary btn-xs')) }}</td>
           <td>{{ date("d F Y", strtotime($order->updated_at)) }} at {{ date("g:ha", strtotime($order->updated_at)) }}</td>
           </tr>
    @endforeach
        </tbody>
      </table>
      
    </div>
  </div>

@stop
