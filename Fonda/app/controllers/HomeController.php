<?php

class HomeController extends BaseController {

	public function index()
	{
		$orders = Order::all();
		return View::make('home.index', compact('orders'));
	}

}
