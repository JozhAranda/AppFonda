<?php
class Food extends Eloquent {

	protected $table = 'foods';

	public static $rules = array(
		'name' 			=> 'required',
		'description' 	=> 'required',
	);

	public static $messages = array(
		'name.required' 		=> 'Required the name',
		'description.required' 	=> 'Required the description'
	);

	public static function validate($data, $id=null) {
		$rules = self::$rules;
		$messages = self::$messages;

		return Validator::make($data, $rules, $messages);
	}

	protected $softDelete = true;

}
?>