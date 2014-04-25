<?php

class OrdersController extends BaseController {

	private $auth;
	
	public function __construct() 
	{
		$this->auth = (Auth::user()->type_id == 1);
	}

	public function index()
	{
		if ($this->auth) {
			$orders = Order::groupBy('number')->with('user')->paginate(10);
			return View::make('orders.index', compact('orders'))->with('auth', $this->auth);
		}else{
			$orders = Order::groupBy('number')->where('user_id', Session::get('id-user'))->paginate(10);
			return View::make('orders.index', compact('orders'))->with('auth', $this->auth);
		}
	}

	public function create()
	{
		$order = new Order;
		$food = Food::lists('name', 'id');		
		return View::make('orders.create', compact('order'))->with('food', $food);
	}

	public function store()
	{
		try
		{

			$inputs = Input::all();
			$foods = Input::get('foods');
			$count = count($foods);
			
			for ($i = 0; $i < $count; $i++) 
			{
				$order 			= new Order;
				$order->user_id = $inputs['user'];
				$order->food_id = $foods[$i];
				$order->number 	= $inputs['user'];
				$order->check 	= 0;

				$order->save();
			}
			return Redirect::to('orders')->with('notice', 'Get new order');

		} catch (Exception $e) {
			return 'error'.$e;
		}
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

	public function show($id)
	{
		$orders = DB::select('select users.name as name, users.last_name as last_name, orders.number as number, foods.name as food_name, orders.check as checks, orders.updated_at as date_order from orders, users, foods where users.id = orders.user_id and foods.id = orders.food_id and orders.number = ?', array($id));
		
		return View::make('orders.show', compact('orders'));
	}

	/*public function orders($id)
	{
		$orders = Order::where('number', $id)->get();

		return View::make('orders.orders', compact('orders'));
	}*/

}
