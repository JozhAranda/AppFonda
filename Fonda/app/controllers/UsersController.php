<?php

class UsersController extends BaseController {

	private $auth;

	public function __construct() {
		$this->auth = (Auth::user()->type_id == 1);
	}

	public function index()
	{
		$user_id = Auth::user()->id;
		$users = User::where('id', '<>', '1')->where('id', '<>', $user_id)->get();
		return View::make('users.index', compact('users'))->with('auth', $this->auth);
	}

	public function create()
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		$user = new User;
		$type_user = TypeUser::lists('name', 'id');
		return View::make('users.create', compact('user'))->with('type_user', $type_user)->with('type_id', 2);
	}

	public function store()
	{

		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		try
		{

			$inputs = Input::all();

			$user 				= new User;
			$user->name 		= $inputs['name'];
			$user->last_name 	= $inputs['last_name'];
			$user->username 	= $inputs['username'];
			$user->type_id 		= $inputs['type_user'];
			$user->password 	= Hash::make($inputs['password']);

			$validator = User::validate_create($inputs);

			if ($validator->fails()){
				$type_user = TypeUser::lists('name', 'id');
				$errors = $validator->messages()->all();
				return View::make('users.create')->with('user', $user)->with('errors', $errors)->with('type_id', $user->type_id)->with('type_user', $type_user);
			}else{
				$user->save();
				
			}
			return Redirect::to('users')->with('notice', 'Added new user');

		} catch (Exception $e) {
			return 'error'.$e;
		}
	}

	public function show($id)
	{
		
	}

	public function edit($id)
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		$user = User::find($id);
		$type_user = TypeUser::lists('name', 'id');
		return View::make('users.edit', compact('user'))->with('type_user', $type_user)->with('type_id', $user->type_id);
	}

	public function update($id)
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		try
		{

			$inputs = Input::all();

			$user 				= User::find($id);
			$user->name 		= $inputs['name'];
			$user->last_name 	= $inputs['last_name'];
			$user->username 	= $inputs['username'];
			$user->type_id 		= $inputs['type_user'];
			$user->save();

			if ($inputs['new_password']) {
				$user->password = Hash::make($inputs['new_password']);
			}

			$validator = User::validate_update($inputs);

			if ($validator->fails()){
				$type_user = TypeUser::lists('name', 'id');
				$errors = $validator->messages()->all();
				return View::make('users.edit')->with('user', $user)->with('errors', $errors)->with('type_id', $user->type_id)->with('type_user', $type_user);;
			}else{
				$user->save();
				return Redirect::to('users')->with('notice', 'Edited user');
			}
		} catch (Exception $e) {
			return 'error'.$e;
		}
	}

	public function destroy($id)
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");		
		$user = User::find($id);
		$user->delete();
		return Redirect::route('users.index');
	}
}