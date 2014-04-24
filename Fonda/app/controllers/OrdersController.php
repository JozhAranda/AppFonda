<?php

class OrdersController extends BaseController {

	public function index()
	{
		//$orders = DB::select('select orders.id as id, users.name as name, users.last_name as last_name, orders.number as number, foods.name as food_name, orders.check as check from orders, users, foods where users.id = orders.user_id and foods.id = orders.food_id');
		$orders = Order::groupBy('number')->get();
		//$orders = Order::orderBy('id', 'asc')->paginate(7);
		return View::make('home.index', compact('orders'));
	}

	public function update($id)
	{
		try {
			
			$orders	= Order::where('number', $id)->get();
			foreach ($orders as $order) {
				$order->check = 1;
				$order->save();
			}
		
		} catch (Exception $e) {
		
			return 'Error';
		
		}
		
		return Redirect::to('orders')->with('notice', 'Check');
	}

}