<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the token value for the "remember me" session.
	 *
	 * @return string
	 */
	public function getRememberToken()
	{
		return $this->remember_token;
	}

	/**
	 * Set the token value for the "remember me" session.
	 *
	 * @param  string  $value
	 * @return void
	 */
	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	/**
	 * Get the column name for the "remember me" token.
	 *
	 * @return string
	 */
	public function getRememberTokenName()
	{
		return 'remember_token';
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	protected $softDelete = true;


	public static $rules_create = array(
		'name' 		=> 'required|min:3|max:40|alpha',
		'username' => 'unique:users',
		'last_name' => 'required|min:3|max:50|alpha',
        'password'  =>'required|alphanum|between:4,8',
	);

	public static $rules_update = array(
		'name' 		=> 'required|min:3|max:40|alpha',
		'username' => 'unique:users',
		'last_name' => 'required|min:3|max:50|alpha',
	);

	public static $messages_create = array(
		'name.required' 		=> 'Required user name',
		'name.min'				=> 'Required mix characteres 3',
		'name.max'				=> 'Requires max characteres 40',
		'name.alpha' 			=> 'Required user name alpha',
		'last_name.required' 	=> 'Required',
		'last_name.min'			=> 'Required mix characteres 3',
		'last_name.max'			=> 'Requires max characteres 40',
		'last_name.alpha' 		=> 'Required last_name alpha',
		'username.unique' 		=> 'Required unique',
		'passowrd.required' 	=> 'Required passowrd',
	);

	public static $messages_update = array(
		'name.required' 		=> 'Required user name',
		'name.min'				=> 'Required mix characteres 3',
		'name.max'				=> 'Requires max characteres 40',
		'name.alpha' 			=> 'Required user name alpha',
		'last_name.required' 	=> 'Required',
		'last_name.min'			=> 'Required mix characteres 3',
		'last_name.max'			=> 'Requires max characteres 40',
		'last_name.alpha' 		=> 'Required last_name alpha',
		'username.unique' 		=> 'Required unique',
	);
	
	public static function validate_create($data, $id=null) {
		$rules = self::$rules_create;
		$messages = self::$messages_create;
		return Validator::make($data, $rules);
	}

	public static function validate_update($data, $id=null) {
		$rules = self::$rules_update;
		$messages = self::$messages_update;
		return Validator::make($data, $rules);
	}
}
