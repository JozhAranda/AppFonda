<?php

class HomeController extends BaseController {

	private $auth;
	public function __construct() {
		try {
			$this->auth = (Auth::user()->type_id == 1);
		} catch (Exception $e) {
			return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");	
		}
	}
	
	public function getIndex()
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