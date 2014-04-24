<?php
class FoodsController extends BaseController {

	public function index()
	{
		$foods = Food::paginate(12);
		return View::make('foods.index', compact('foods'));
	}

	public function create()
	{
		$food = new Food;
		return View::make('foods.create', compact('food'));
	}

	public function store()
	{
		try {
			$food = new Food;
			$food->name 		= Input::get('name');
			$food->description 	= Input::get('description');
			$food->save();
			return Redirect::to('foods')->with('notice', 'Added new food');
		} catch (Exception $e) {
			
		}

	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
	}

	public function update($id)
	{
	}

	public function destroy($id)
	{
	}

}