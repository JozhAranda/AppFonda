<?php

class UsersController extends BaseController {

	private $auth;

	public function __construct() {
		$this->auth = (Auth::user()->type_id == 1);
	}

	public function index()
	{
		$users = User::all();
		return View::make('users.index', compact('users'));
	}

	public function create()
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		$user = new User;
		$type_user = DB::table('type_users')->orderBy('id', 'asc')->lists('name');
		return View::make('users.create', compact('user'))->with('type_user', $type_user);
	}

	public function store()
	{
<<<<<<< HEAD
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		//$input = Input::all();
=======
>>>>>>> a6638b0342a2cf9faef411c2db867525d3646135

		try
		{

			$input = Input::all();
			$validator = Validator::make($input, User::$rulesUser);

			$user 				= new User;
			$user->name 		= Input::get('name');
			$user->last_name 	= Input::get('last_name');
			$user->username 	= Input::get('username');
			$user->password 	= Hash::make(Input::get('password'));
			//$user->type_user 	= Input::has('type_user');
			//$user->type_user 	= Input::has('type_user') ? intval(Input::get('type_user')) : null
			if ($validator->fails()){
				$erros = $validator->messages()->all();
				return View::make('users.create')->with('user', $user)->with('errors', $erros);
			}else{
				$food->save();
				
			}
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
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
		$user = User::find($id);
		return View::make('users.edit', compact('user'));
	}

	public function update($id)
	{
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");
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
		if(!$this->auth) return Redirect::to('auth/login')->with('notice', "You must log in of type Administrator");		
		$user = User::find($id);
		$user->delete();
		return Redirect::route('users.index');
	}
}