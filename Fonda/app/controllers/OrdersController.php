<?php

class OrdersController extends BaseController {

	public function index()
	{
		$orders = DB::select('select orders.id as id, users.name as name, users.last_name as last_name, orders.number as number, foods.name as food_name from orders, users, foods where users.id = orders.user_id and foods.id = orders.food_id');
		//$orders = Order::orderBy('id', 'asc')->paginate(7);
		return View::make('home.index', compact('orders'));
	}

	public function update($id)
	{
		try {
			
			$order 			= Order::find($id);
			$order->check 	= Input::get('check');
			$order->save();
		
		} catch (Exception $e) {
		
			return 'Error';
		
		}
		
		return Redirect::to('users')->with('notice', 'Edited');
	}

}