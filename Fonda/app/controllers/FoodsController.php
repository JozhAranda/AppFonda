<?php
class FoodsController extends BaseController {

	public function index()
	{
		$foods = Food::paginate(15);
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
			$input = Input::all();

			$validator = Validator::make($input, Food::$createRules);
			
			$food = new Food;
			$food->name 		= $input['name'];
			$food->description 	= $input['description'];

			if ($validator->fails()){
				$erros = $validator->messages()->all();
				return View::make('foods.edit')->with('food', $food)->with('errors', $erros);
			}else{
				$food->save();
				return Redirect::to('foods')->with('notice', 'Added new food');
			}

			
			
		} catch (Exception $e) {
			return 'error'.$e;
		}

	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$food = Food::find($id);
		return View::make('foods.edit', compact('food'));
	}

	public function update($id)
	{
		try {
			$food = Food::find($id);
			$food->name = Input::get('name');
			$food->description = Input::get('description');
			$food->save();
		} catch (Exception $e) {
			return 'Error';
		}
		return Redirect::to('foods')->with('notice', 'Edited');
	}

	public function destroy($id)
	{
		try {
			$food = Food::find($id);
			$food->delete();
		} catch (Exception $e) {
						
		}
	}

}