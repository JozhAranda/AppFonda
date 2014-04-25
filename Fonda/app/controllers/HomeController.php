<?php

class HomeController extends BaseController {

	private $auth;
	public function __construct() {
		$this->auth = (Auth::user()->type_id == 1);
	}
	
	public function index()
	{
		if ($this->auth) {
			$orders = Order::groupBy('number')->with('user')->paginate(10);
			return View::make('home.index', compact('orders'))->with('auth', $this->auth);
		}else{
			$orders = Order::groupBy('number')->where('user_id', Session::get('id-user'))->paginate(10);
			return View::make('home.index', compact('orders'))->with('auth', $this->auth);
		}
		
	}

}
?>