<?php

class OrdensController extends BaseController {

	public function index()
	{
		$foods = Food::paginate(5);
		return View::make('food.index', compact($food));
	}

}