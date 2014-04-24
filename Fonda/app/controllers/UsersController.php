<?php

class UsersController extends BaseController {

	public function index()
	{
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	public function create()
	{		
		$user = new User;
		$type_user = DB::table('type_users')->orderBy('id', 'asc')->lists('name');
		return View::make('users.create', compact('user'))->with('type_user', $type_user);
	}

	public function store()
	{
		//$input = Input::all();

		//$validator = Validator::make($input, User::$RulesUser);

		//if ($validator->fails()) throw new Exception($validator->messages());
		
		try {
			$user 				= new User;
			$user->name 		= Input::get('name');
			$user->last_name 	= Input::get('last_name');
			$user->username 	= Input::get('username');
			$user->password 	= Input::get('password');
			//$user->type_user 	= Input::has('type_user');
			//$user->type_user 	= Input::has('type_user') ? intval(Input::get('type_user')) : null
			$user->save();
			return Redirect::to('users')->with('notice', 'Added new user');
		} catch (Exception $e) {
			
		}
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$user = User::find($id);
		return View::make('users.edit', compact('user'));
	}

	public function update($id)
	{
		try {
			
			$user 				= User::find($id);
			$user->name 		= Input::get('name');
			$user->last_name 	= Input::get('last_name');
			$user->username 	= Input::get('username');
			$user->save();
		
		} catch (Exception $e) {
		
			return 'Error';
		
		}
		
		return Redirect::to('users')->with('notice', 'Edited');
	}

	public function destroy($id)
	{		
		$user = User::find($id);
		$user->delete();
		return Redirect::route('users.index');
	}
}