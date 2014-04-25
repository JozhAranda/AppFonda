<?php
class FoodsController extends BaseController {

	private $auth;
	public function __construct() {
		$this->auth = (Auth::user()->type_id == 1);
	}

	public function index()
	{
		$foods = Food::paginate(15);
		return View::make('foods.index', compact('foods'))->with('auth', $this->auth);
	}

	public function create()
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', 'You must log in of type Administrator');
		$food = new Food;
		return View::make('foods.create', compact('food'));
	}

	public function store()
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', 'You must log in of type Administrator');
		try {
			$inputs = Input::all();
			
			$food = new Food;
			$food->name 		= $inputs['name'];
			$food->description 	= $inputs['description'];
			
			$validator = Food::validate($inputs);

			if ($validator->fails()){
				$erros = $validator->messages()->all();
				return View::make('foods.create')->with('food', $food)->with('errors', $erros);
			}else{
				$food->save();
				
			}
			return Redirect::to('foods')->with('notice', 'Added new food');
			
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
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', 'You must log in of type Administrator');
		$food = Food::find($id);
		return View::make('foods.edit', compact('food'));
	}

	public function update($id)
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', 'You must log in of type Administrator');
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
		if(!$this->auth) return Redirect::to('auth/login')->with('You must log in of type Administrator');
		try {
			$food = Food::find($id);
			$food->delete();
		} catch (Exception $e) {
						
		}
	}

}